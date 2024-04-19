<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $user = $request->user();
        if($user)
        {
            return [
                ...parent::share($request),
                'auth' => [
                    'user' => $user,
                    'roles' => Cache::get("user.{$user->id}.roles"),
                    'rolesNames' => Cache::get("user.{$user->id}.roleNames"),
                    'permissions' => Cache::get("user.{$user->id}.permissions"),
                ],
                'version' => [
                    'laravel' => Application::VERSION,
                    'php' => PHP_VERSION,
                ],
                'appName' => Config::get('app.name'),
                'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
                'status' => session('status'),
            ];
        }

        return [
            ...parent::share($request),
            'version' => [
                'laravel' => Application::VERSION,
                'php' => PHP_VERSION,
            ],
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ];
    }
}
