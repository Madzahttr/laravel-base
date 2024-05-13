<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserInfoUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
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

        if(!$user) return redirect()->route('admin.users.show');

        return Inertia::render('Admin/Users/Edit', [
            'user' => $user,
        ]);
    }

     /**
     * Update User Informaton
     */
    public function update(UserInfoUpdateRequest $request, string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        if(!$user) return Redirect::route('admin.users.edit', $id);

        $user->fill($request->validated());

        if($user->isDirty('email')) $user->email_verified_at = null;

        $user->save();

        return Redirect::route('admin.users.edit', $id);
    }

     /**
     * Delete user
     */
    public function destroy(Request $request, string $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();
        if(!$user) return Redirect::route('admin.users.edit', $id);

        $user->delete();

        return Redirect::route('admin.users.show');
    }
}
