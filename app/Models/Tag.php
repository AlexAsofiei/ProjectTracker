<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'tags_activities', 'tag_id', 'activity_id');
    }
}
