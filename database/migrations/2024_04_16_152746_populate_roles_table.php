<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $adminPerm = Permission::where('node', 'administrator')->first();
        $placeholder1Perm = Permission::where('node', 'placeholder1')->first();
        $placeholder2Perm = Permission::where('node', 'placeholder2')->first();
        $placeholder3Perm = Permission::where('node', 'placeholder3')->first();
        $placeholder4Perm = Permission::where('node', 'placeholder4')->first();
        $placeholder5Perm = Permission::where('node', 'placeholder5')->first();

        $admin = Role::create(['name' => 'admin']);

        $admin->permissions()->attach([$adminPerm->id]);
        $admin->permissions()->attach([$placeholder1Perm->id]);
        $admin->permissions()->attach([$placeholder2Perm->id]);
        $admin->permissions()->attach([$placeholder3Perm->id]);
        $admin->permissions()->attach([$placeholder4Perm->id]);
        $admin->permissions()->attach([$placeholder5Perm->id]);

        $user = Role::create(['name' => 'user']);

        $user->permissions()->attach([$placeholder1Perm->id]);
        $user->permissions()->attach([$placeholder2Perm->id]);
        $user->permissions()->attach([$placeholder3Perm->id]);
        $user->permissions()->attach([$placeholder4Perm->id]);
        $user->permissions()->attach([$placeholder5Perm->id]);

        $test = Role::create(['name' => 'test']);

        $test->permissions()->attach([$placeholder1Perm->id]);
        $test->permissions()->attach([$placeholder2Perm->id]);
        $test->permissions()->attach([$placeholder3Perm->id]);
        $test->permissions()->attach([$placeholder4Perm->id]);
        $test->permissions()->attach([$placeholder5Perm->id]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
