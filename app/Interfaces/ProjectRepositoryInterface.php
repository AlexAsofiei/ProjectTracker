<?php

namespace App\Interfaces;

use App\DataTransferObjects\ProjectDTO;
use Illuminate\Support\Collection;

interface ProjectRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?ProjectDTO;
    public function create(array $attributes): ProjectDTO;
    public function update(int $id, array $attributes): ProjectDTO;
    public function delete(int $id): bool;
}
