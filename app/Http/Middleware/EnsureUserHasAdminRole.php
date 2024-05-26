<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Sprawdź, czy użytkownik jest zalogowany i czy ma rolę "Administrator"
        if (auth()->check() && auth()->user()->role->nazwa == 'Administrator') {
            return $next($request);
        }

        // Jeśli użytkownik nie jest administratorem, zwróć błąd 403
        abort(403, 'Access denied - You do not have permission to access this page.');
    }
}
