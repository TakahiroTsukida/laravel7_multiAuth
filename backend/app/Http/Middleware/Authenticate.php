<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @var string
     */
    protected $user_route  = 'frontend.login';
    protected $admin_route = 'backend.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // ルーティングに応じて未ログイン時のリダイレクト先を振り分ける
        if (!$request->expectsJson()) {
            if (Route::is('frontend.*')) {
                return route($this->user_route);
            } elseif (Route::is('backend.*')) {
                return route($this->admin_route);
            }
        }
    }
}
