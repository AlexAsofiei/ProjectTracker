<?php

namespace App\DataTransferObjects;

use App\Models\Activity;
use App\Models\Project;
use App\DataTransferObjects\ActivityDTO;

class ProjectDTO
{
    public int $id;
    public string $name;
    public string $description;
    public bool $is_active;
    public array $activities;

    public function __construct(int $id, string $name, string $description, bool $is_active, array $activities)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->is_active = $is_active;
        $this->activities = $activities;
    }

    public static function fromModel(Project $project): self
    {
        // return new self($project->id, $project->name, $project->description, $project->is_active, $project->$activities);

        $activities = $project->activities->map(function (Activity $activity) {
            return ActivityDTO::fromModel($activity);
        })->toArray();

        return new self($project->id, $project->name, $project->description, $project->is_active, $activities);
    }
}