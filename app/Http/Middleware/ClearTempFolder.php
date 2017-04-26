<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
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
            if($request->headers->get('referer') !== route('make') ){
                $tempDirectory = 'temp'.DIRECTORY_SEPARATOR.Auth::id();
                if (Storage::exists($tempDirectory)) Storage::deleteDirectory($tempDirectory);
            }
        }

        return $next($request);
    }
}
