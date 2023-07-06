<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'route'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
