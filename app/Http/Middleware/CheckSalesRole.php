<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckSalesRole
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
        if (auth()->check() && auth()->user()->role == User::ROLE_ADMIN && auth()->user()->role == User::ROLE_SALERS) {
            return $next($request);
        } 
        //403 không có quyền truy cập
        return abort(403, 'Unauthorized action.');
    }
}
