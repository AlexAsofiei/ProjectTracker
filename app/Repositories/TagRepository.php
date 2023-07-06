<?php

namespace App\Repositories;

use App\DataTransferObjects\TagDTO;
use App\Models\Tag;
use App\Interfaces\TagRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagRepository implements TagRepositoryInterface
{
    public function all(): Collection
    {
        return Tag::all();
    }

    public function find(int $id): ?TagDTO
    {
        $tag = Tag::with('activities')->find($id);
        return $tag ? TagDTO::fromModel($tag) : null;
    }

    public function create(array $attributes): TagDTO
    {
        $tag = Tag::create($attributes);
        return TagDTO::fromModel($tag);

    }    

    public function delete(int $id): bool
    {
        return Tag::destroy($id) > 0;
    }
}
