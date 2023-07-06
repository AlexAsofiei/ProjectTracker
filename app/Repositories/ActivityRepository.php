<?php

// namespace App\Repositories;

// use App\DataTransferObjects\ActivityDTO;
// use App\Models\Activity;
// use App\Interfaces\ActivityRepositoryInterface;
// use App\Models\Tag;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Collection;

// class ActivityRepository implements ActivityRepositoryInterface
// {
    // public function all(): Collection
    // {
    //     return Activity::all();
    // }

    // public function find(int $id): ?ActivityDTO
    // {
    //     $activity = Activity::find($id);
    //     return $activity ? ActivityDTO::fromModel($activity) : null;
    // }

    // public function create(array $attributes): ActivityDTO
    // {
    //     $activity = Activity::create($attributes);
    //     return ActivityDTO::fromModel($activity);

    // }    

    // public function delete(int $id): bool
    // {
    //     return Activity::destroy($id) > 0;
    // }

    // public function addTagsToActivity(ActivityDTO $activityDTO){
    //     $activity = Activity::findOrFail($activityDTO->id);

    //     $activity->tags()->detach();

    //     foreach($activityDTO->tags as $tagName){
    //         $tag = Tag::firstOrCreate(['name' => $tagName]);
    //         $activity->tags()->attach($tag);
    //     }
    // }
// }
