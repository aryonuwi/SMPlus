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
        Schema::create('cloud_capacity', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cluster_id');
            $table->integer('mem');
            $table->integer('cpu');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('cluster_id')->references('id')->on('cluster')->onDelete('cascade');
            $table->index(['cluster_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloud_capacity');
    }
};
