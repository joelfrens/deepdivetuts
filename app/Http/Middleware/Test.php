<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
use App\User;

class Test
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
        $userId = \Auth::id();
        $user = User::find($userId);
        if ($user->status == 0){
            echo "Sorry, your account has been disabled.";
        }
        dd($user);
        dd($request);
        return $next($request);
    }
}
