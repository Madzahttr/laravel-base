<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleDeleteRequest;
use App\Http\Requests\Admin\RoleInfoUpdateRequest;
use App\Models\Role;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class RolesController extends Controller implements HasMiddleware
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
     * Display Roles
     */
    public function show(Request $request): Response
    {
        return Inertia::render('Admin/Roles/Show', [
            'roles' => Role::all(),
        ]);
    }

     /**
     * Edit role
     */
    public function edit(Request $request, string $id)
    {
        $role = Role::where('id', $id)->first();

        if(!$role) return redirect()->route('admin.roles.show');
        $role->permissions;

        return Inertia::render('Admin/Roles/Edit', [
            'role' => $role,
        ]);
    }

     /**
     * Update Role Information
     */
    public function update(RoleInfoUpdateRequest $request, string $id): RedirectResponse
    {
        $role = Role::where('id', $id)->first();
        if(!$role) return Redirect::route('admin.roles.edit', $id);

        $role->fill($request->validated());

        $role->save();

        return Redirect::route('admin.roles.edit', $id);
    }

     /**
     * Delete Role
     */
    public function destroy(RoleDeleteRequest $request, string $id): RedirectResponse
    {
        $role = Role::where('id', $id)->first();
        if(!$role) return Redirect::route('admin.roles.edit', $id);

        $role->users()->detach();
        $role->permissions()->detach();

        $role->delete();

        return Redirect::route('admin.roles.show');
    }
}
