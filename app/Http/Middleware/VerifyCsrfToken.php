<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */

    public function handle($request, Closure|\Closure $next)
    {
        $response = $next($request);
        return $response
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate');
    }

    protected $except = [
        //
    ];
}
