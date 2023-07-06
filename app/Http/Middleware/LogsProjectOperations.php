<?php

namespace App\Http\Middleware;

use App\Models\ProjectLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogsProjectOperations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $projectLog = new ProjectLog();  

        $projectLog->fill([
            'route' => $request->route()->getName(), 
            'project_id' => $request->route()->getName() === 'projects.update' ? $request->id : null
        ])->save();

        return $next($request);
    }
}
