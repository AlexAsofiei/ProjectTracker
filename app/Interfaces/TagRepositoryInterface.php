<?php

namespace App\Interfaces;

use App\DataTransferObjects\TagDTO;
use Illuminate\Support\Collection;

interface TagRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?TagDTO;
    public function create(array $attributes): TagDTO;
    public function delete(int $id): bool;
}
