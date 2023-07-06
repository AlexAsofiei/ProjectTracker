<?php

namespace App\DataTransferObjects;

use App\Models\Activity;
use App\Models\Tag;
use App\DataTransferObjects\TagDTO;

class ActivityDTO
{
    public int $id;
    public int $project_id;
    public string $name;
    public string $description;
    public string $start_date;
    public string $end_date;
    public array $tags;

    public function __construct(int $id, int $project_id, string $name, string $description, string $start_date, string $end_date, array $tags)
    {
        $this->id = $id;
        $this->project_id = $project_id;
        $this->name = $name;
        $this->description = $description;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->tags = $tags;
    }

    public static function fromModel(Activity $activity): self
    {
        $tags = $activity->tags->map(function (Tag $tag) {
            return TagDTO::fromModel($tag);
        })->toArray();

        return new self($activity->id, $activity->project_id, $activity->name, $activity->description, $activity->start_date, $activity->end_date, $tags);
    }

//     public static function fromModel(Activity $activity): self
//     {
//         return new self($activity->id, $activity->name, $activity->description, $activity->start_date, $activity->end_date);
//     }
}