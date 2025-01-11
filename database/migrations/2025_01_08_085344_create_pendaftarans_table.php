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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();  // unsignedBigInteger by default
            $table->string('nama');
            $table->string('nim')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('prodi');
            $table->string('jurusan');
            $table->year('tahun_kepengurusan');
            $table->enum('jabatan', ['anggota'])->default('anggota');
            $table->unsignedBigInteger('id_divisi')->nullable();
            $table->unsignedBigInteger('id_organisasi')->nullable();
            $table->enum('status', ['aktif', 'non aktif'])->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
