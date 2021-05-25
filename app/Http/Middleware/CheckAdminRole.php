<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckAdminRole
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
        // nếu đã login và 
        if (auth()->check() && auth()->user()->role == User::ROLE_ADMIN) {
            return $next($request);
        } 
        //403 không có quyền truy cập
        return abort(403, 'Unauthorized action.');
    }
}
