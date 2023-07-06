<?php

namespace App\DataTransferObjects;

use App\Models\Activity;
use App\Models\Tag;
use App\DataTransferObjects\ActivityDTO;

class TagDTO
{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromModel(Tag $tag): self
    {
        return new self($tag->id, $tag->name);

        $activities = $tag->activities->map(function (Activity $activity) {
            return ActivityDTO::fromModel($activity);
        })->toArray();

        return new self($tag->id, $tag->name, $activities);
    }
}