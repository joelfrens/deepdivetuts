<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckStatus
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

        // hack for now so that no other user who registers has access to admin section.
        if ($user->status >= 0 && $user->id > 1) {
            echo "Sorry, Your account has been disabled.";
            exit;
        }

        return $next($request);
    }
}
