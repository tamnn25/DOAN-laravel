<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;

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
        $authAdmin = auth()->guard('admin');
        // nếu đã login và 
        if ($authAdmin->check() && $authAdmin->user()->role_id == Admin::ROLE_ADMIN) {
            return $next($request);
        } 
        //403 không có quyền truy cập
        return abort(403, 'Unauthorized action.');
    }
}
