<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!in_array($request->user()->role_id, array_intersect_key(User::ROLE, array_flip($roles)))) {
            switch ($request->user()->role_id) {
                case User::ROLE['admin']:
                    return redirect()->route('dashboard');
                    break;
                case User::ROLE['customer']:
                    return redirect()->route('home');
                    break;
                case User::ROLE['invaestor']:
                    return redirect()->route('laporan');
                    break;
                default:
                    return 'terjadi kesalahan';
                    break;
            }
        }

        return $next($request);
    }
}
