<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // return $next($request);
        if(auth()->check()){
            if(auth()->user()->role == 'admin'){
                return $next($request);
            }
        }    

        abort(403, 'Unauthorized action.');
    }
}
