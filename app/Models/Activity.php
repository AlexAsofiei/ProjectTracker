<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'start_date',
        'end_date',
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tags_activities', 'activity_id', 'tag_id');
    }
}
