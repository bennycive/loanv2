<?php

namespace Laramin\Utility;

use Closure;

class Utility
{
    public function handle($request, Closure $next)
    {
        // Allow all requests to pass through without activation check
        return $next($request);

        
    }
}
