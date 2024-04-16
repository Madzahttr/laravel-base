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
        $admin = Role::create(['name' => 'admin']);
        $adminPerm = Permission::where('node', 'administrator')->first();

        $admin->permissions()->attach([$adminPerm->id]);

        $user = Role::create(['name' => 'user']);
        $userPerm = Permission::where('node', 'placeholder')->first();

        $user->permissions()->attach([$userPerm->id]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
