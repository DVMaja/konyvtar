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
    protected $except = [
        //a tesztelés idejére mindenképpen kell, de ha élesben megy, akkor ki kell  szedni
        '/api/books/*',
        '/api/books',
        '/api/lendings/*/*/*',
        '/api/user_password/*'
        
        
    ];
}
