<?php

namespace App\Repositories;

use App\DataTransferObjects\ProjectDTO;
use App\Models\Project;
use App\Interfaces\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all(): Collection
    {
        return Project::whereIsActive(true)->get();
    }

    public function find(int $id): ?ProjectDTO
    {
        $project = Project::with(['activities', 'activities.tags'])->find($id);
        return $project ? ProjectDTO::fromModel($project) : null;
    }

    public function create(array $attributes): ProjectDTO
    {
        $project = Project::create($attributes);
        return ProjectDTO::fromModel($project);

    }

    public function update(int $id, array $attributes): ProjectDTO
    {
        $project = Project::findOrFail($id);
        $project->update($attributes);
        return ProjectDTO::fromModel($project);;
    }

    public function delete(int $id): bool
    {
        return Project::find($id)->delete();
    }
}
