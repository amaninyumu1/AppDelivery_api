<?php

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
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Role::class)->nullable()->constrained()->cascadeOnDelete();
            $table->primary(['user_id', 'role_id']);
        });
        Schema::dropIfExists('user_role');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('user_role');
    }
};
