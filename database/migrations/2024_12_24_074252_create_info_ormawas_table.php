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
        Schema::create('info_ormawas', function (Blueprint $table) {
            $table->id();  // unsignedBigInteger by default
            $table->unsignedBigInteger('id_organisasi');
            $table->year('tahun_kepengurusan');
            $table->unsignedBigInteger('id_ketum_organisasi')->nullable();;
            $table->unsignedBigInteger('id_waketum_organisasi')->nullable();;
            $table->unsignedBigInteger('id_sekretaris')->nullable();;
            $table->unsignedBigInteger('id_bendahara')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_ormawas');
    }
};
