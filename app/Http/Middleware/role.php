<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
public function handle(Request $request, Closure $next)
{
    $user = $request->user();

    if (!$user || !$user->is_admin) {
        abort(403, 'Anda tidak memiliki hak Admin.');
    }

    return $next($request);
}

}
