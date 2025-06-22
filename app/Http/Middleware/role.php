<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user || $user->role !== 'admin') {
            abort(403, 'Anda bukan admin.');
        }

        return $next($request);
    }
}
