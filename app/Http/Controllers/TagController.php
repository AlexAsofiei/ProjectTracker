<?php

namespace App\Http\Controllers;

use App\Interfaces\TagRepositoryInterface;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $tags = $this->tagRepository->all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tags,name',
        ]);

        $tagDTO = $this->tagRepository->create($request->only('name'));

        return redirect()->route('tags.index')->with('success', 'Tag created successfully!');
    }

    public function show(int $id)
    {
        $tagDTO = $this->tagRepository->find($id);
        return view('tags.show', compact('tagDTO'));
    }

    public function destroy(int $id)
    {
        $this->tagRepository->delete($id);
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
