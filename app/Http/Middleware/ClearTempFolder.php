<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClearTempFolder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $tempDirectory = 'temp'.DIRECTORY_SEPARATOR.Auth::id();
            if (is_dir(storage_path().DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$tempDirectory)) Storage::deleteDirectory($tempDirectory);
        }

        return $next($request);
    }
}
