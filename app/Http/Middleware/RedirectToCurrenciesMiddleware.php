<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToCurrenciesMiddleware
{
    public function handle($request, Closure $next)
    {
        return redirect('/admin/currencies');
    }
}
