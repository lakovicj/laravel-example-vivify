<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
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
        $queryAge = $request->query('age');

        if ($queryAge && $queryAge >= 18) {
            return $next($request);
        }

        /*
        return (is_null($queryAge)) ? response("Woops, no 'age' param in query!", 403) :
                                        response("Woops, 'age' param should be >=18!", 403);
        */


        if (is_null($queryAge)) {
            return response("Woops, no 'age' param in query!", 403);
        } else {
            return response("Woops, 'age' param should be >=18!", 403);
        }

    }
}
