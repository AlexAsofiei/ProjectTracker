<?php

namespace App\Providers;

use App\Interfaces\ActivityRepositoryInterface;
use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Models\Project;
use App\Repositories\ActivityRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TagRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        // $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
