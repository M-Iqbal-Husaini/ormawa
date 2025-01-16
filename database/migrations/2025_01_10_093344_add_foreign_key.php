<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Tambahkan foreign key untuk tabel divisi
        Schema::table('ormawas', function (Blueprint $table) {
            $table->foreign('id_organisasi')->references('id')->on('organisasis')->onDelete('cascade');
        });

        Schema::table('divisis', function (Blueprint $table) {
            $table->foreign('id_organisasi')->references('id')->on('organisasis')->onDelete('cascade');
        });

        Schema::table('anggotas', function (Blueprint $table) {
            $table->foreign('id_organisasi')->references('id')->on('organisasis')->onDelete('cascade');
        });

        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->foreign('id_divisi')->references('id')->on('divisis')->onDelete('cascade');
        });

        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->foreign('id_organisasi')->references('id')->on('organisasis')->onDelete('cascade');
        });

        Schema::table('wa_links', function (Blueprint $table) {
            $table->foreign('id_organisasi')->references('id')->on('organisasis')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Drop foreign keys saat rollback
        Schema::table('ormawas', function (Blueprint $table) {
            $table->dropForeign(['id_organisasi']);
        });

        Schema::table('divisis', function (Blueprint $table) {
            $table->dropForeign(['id_organisasi']);
        });

        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropForeign(['id_organisasi']);
        });
    }

};
