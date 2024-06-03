<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use DateTimeZone;

class SetUserTimezone
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $timezone = Auth::user()->time_zone;
            if ($timezone && in_array($timezone, DateTimeZone::listIdentifiers())) {
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);
            }
        }

        return $next($request);
    }
}

