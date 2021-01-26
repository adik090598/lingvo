<?php

namespace App\Http\Middleware;


use App\Core\Traits\ErrorTrait;
use Closure;

class RoleOr
{
    use ErrorTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roleIds)
    {
        if (in_array(auth()->user()->role_id, $roleIds)) {
            return $next($request);
        } else {
            request()->session()->flash('warning', 'Доступ запрещен!');
            return redirect()->route('login');

        }
    }
}
