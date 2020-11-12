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

        if ($queryAge && $queryAge > 18) {
            return $next($request);
        }

        if (is_null($queryAge)) {
            echo "<br><hr>Woops, no 'age' param in query!";
        } elseif ($queryAge < 19) {
            echo "<br><hr> Woops, 'age' param should be >18!";
        }
    }
}
