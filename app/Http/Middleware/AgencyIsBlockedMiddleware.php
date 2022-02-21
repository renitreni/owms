<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyIsBlockedMiddleware
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
        if (auth()->user()->role == '2') {
            $agency_count = Agency::query()->where('id', auth()->user()->agency_id)->where('status', '<>',
                'Active')->count();
            if ($agency_count == '0') {
                return redirect()->route('blocked');
            }
        }

        return $next($request);
    }
}
