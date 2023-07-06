<?php

namespace App\Interfaces;

// use App\DataTransferObjects\ActivityDTO;
use App\Models\Activity;
use Illuminate\Support\Collection;

interface ActivityRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Activity;
    public function create(array $attributes): Activity;
    public function delete(int $id): bool;
    public function addTagsToActivity(array $attributes);
}
