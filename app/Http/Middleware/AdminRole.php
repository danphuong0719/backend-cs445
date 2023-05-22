<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = Auth::id();
        if($auth == null )
            return \response()->json("Unauth", 403);
        $query = User::query();
        $user = $query->find($auth);
        if($user->role != 'ADMIN')
            return \response()->json("Access denied", 403);
        return $next($request);
    }
}
