<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
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

        if(!$role) return redirect()->route('admin.roles');

        return Inertia::render('Admin/Roles/Edit', [
            'role' => $role,
        ]);
    }
}
