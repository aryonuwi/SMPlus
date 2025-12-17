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
        Schema::create('cluster', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cluster_name', 150)->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
      public function down(): void
    {
        Schema::dropIfExists('cluster');
    }
};
