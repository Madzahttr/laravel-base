<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller implements HasMiddleware
{
     /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            'checkPermission:administrator'
        ];
    }

     /**
     * Display Users
     */
    public function show(Request $request): Response
    {
        return Inertia::render('Admin/Users/Show', [
            'users' => User::all(),
        ]);
    }

     /**
     * Edit User
     */
    public function edit(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        if(!$user) return redirect()->route('admin.users');

        return Inertia::render('Admin/Users/Edit', [
            'user' => $user,
        ]);
    }
}
