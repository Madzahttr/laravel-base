<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Permission::create(['node' => 'administrator']);
        Permission::create(['node' => 'placeholder1']);
        Permission::create(['node' => 'placeholder2']);
        Permission::create(['node' => 'placeholder3']);
        Permission::create(['node' => 'placeholder4']);
        Permission::create(['node' => 'placeholder5']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
