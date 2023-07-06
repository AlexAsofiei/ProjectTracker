<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateActivity;
use App\Interfaces\ActivityRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Models\Activity;
use App\Models\Project;
use App\Models\Tag;
use Illuminate\Http\Request;

class ActivityController extends Controller 
{
    // private $activityRepository;
    // private $tagRepository;

    // public function __construct(ActivityRepositoryInterface $activityRepository, TagRepositoryInterface $tagRepository)
    // {
    //     $this->activityRepository = $activityRepository;
    //     $this->tagRepository = $tagRepository;
    // }

    public function index()
    {
        $activities = Activity::all();
        $activities->load('project');

        return view('activities.index', ['activities' => $activities]);
    }

    public function create()
    {
        $projects = Project::all();
        return view('activities.create', ['projects' => $projects]);
    }

    public function store(ValidateActivity $request, Activity $activity)
    {   
        $activity->fill($request->validated())->save();
        
        return redirect()->route('activities.index')->with('success', 'Activity created successfully!');
    }

    public function show(Activity $activityDTO)
    {        
        $tagDTO = Tag::all();
        
        return view('activities.show', ['activityDTO' => $activityDTO, 'tagDTO' => $tagDTO]);
    }

    public function edit(Activity $activity)
    {
        $projects = Project::all();
        return view('activities.edit', ['activity' => $activity, 'projects' => $projects]);
    }

    public function update(ValidateActivity $request, Activity $activity)
    {        
        $activity->update($request->validated());

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        
        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }

    public function addTagsToActivity(Request $request, Activity $activity){        

        $request->validate([
            'tags.*' => 'exists:tags,id'
        ]);

        $activity->tags()->sync($request->get('tags'));

        return redirect()->back()->with('message', 'Tags added successfully');
    }
}
