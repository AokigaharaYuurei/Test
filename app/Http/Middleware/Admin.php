<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */    
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->isAdmin() === true) {
                return $next($request);
            } else {
                // Если пользователь авторизован, но не админ
                // Перенаправляем на dashboard с сообщением об ошибке
                return redirect()->route('dashboard')->with('error', 'У вас нет прав администратора для доступа к этой странице.');
            }
        }

        // Если не авторизован
        return redirect()->route('login')->with('error', 'Пожалуйста, авторизуйтесь.');
    }
}
