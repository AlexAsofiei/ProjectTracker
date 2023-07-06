<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class Project extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'type',
    //     'is_active'
    // ];

    protected $guarded = [
        'id'
    ];

    public function activities(){
        return $this->hasMany(Activity::class);
    }

    public function projectLogs(){
        return $this->hasMany(ProjectLog::class);
    }

    public function delete(){

        $projectLog = $this->projectLogs()->first();

        if( $projectLog ){
            throw new ConflictHttpException('Cannot delete projects with logs.');
        }
        
        return parent::delete();
    }
}
