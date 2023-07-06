<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class ProjectPolicy
{    
    public function update(?User $user = null, Project $project): bool
    {
        return $project->activities()->count() > 0;
    }
}