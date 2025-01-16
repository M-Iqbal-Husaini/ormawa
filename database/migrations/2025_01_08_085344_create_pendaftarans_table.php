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
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('prodi');
            $table->string('jurusan');
            $table->year('tahun_kepengurusan');
            $table->enum('jabatan', ['anggota'])->default('anggota');
            $table->unsignedBigInteger('id_divisi');
            $table->unsignedBigInteger('id_organisasi');
            $table->enum('status', ['aktif', 'non aktif'])->default('aktif');
            $table->text('motivasi')->nullable(); // Pastikan kolom ini nullable jika tidak wajib
            $table->string('cv');
            $table->enum('status_daftar', ['Pending', 'Diterima', 'Ditolak'])->default('Pending');
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
