<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BlockMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // Kiểm tra nếu người dùng đã đăng nhập và bị khóa
        if (auth()->check() && auth()->user()->block == 1) {
            Auth::logout();
            return redirect('/')->with('success', 'Không thể đăng nhập, tài khoản của bạn đã bị chặn.');
        }

        return $next($request); 
    }
}


