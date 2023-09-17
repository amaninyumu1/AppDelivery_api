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
        Schema::create('galerie_plat', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\GalerieImage::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Plat::class)->nullable()->constrained()->cascadeOnDelete();
            $table->primary(['galerie_image_id', 'plat_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galerie_plat');
    }
};
