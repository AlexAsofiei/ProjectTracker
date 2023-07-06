<?php

namespace App\Http\Controllers;

use App\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:projects,name',
            'description' => 'required|string|min:3|max:255',
            'is_active' => 'required|integer|min:0|max:1',
        ]);

        $projectDTO = $this->projectRepository->create($request->only('name', 'description', 'is_active'));

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function show(int $id)
    {
        $projectDTO = $this->projectRepository->find($id);
        return view('projects.show', compact('projectDTO'));
    }

    public function edit(int $id)
    {
        $projectDTO = $this->projectRepository->find($id);
        return view('projects.edit', compact('projectDTO'));
    }

    public function update(Request $request, int $id)
    {
        $project = Project::find($id);

        $this->authorize('update', $project);

        $request->validate([
            'name' => 'required|string|min:3|max:255|unique:projects,name',
            'description' => 'nullable|string|min:3|max:255',
            'is_active' => 'required|boolean',
        ]);

        $this->projectRepository->update($id, $request->only('name', 'description', 'is_active'));

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(int $id)
    {
        $this->projectRepository->delete($id);
        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }
}