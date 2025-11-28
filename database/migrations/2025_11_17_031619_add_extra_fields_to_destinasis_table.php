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
        // --- PERBAIKAN: UBAH MENJADI 'destinasi' ---
        Schema::table('destinasi', function (Blueprint $table) {
            $table->string('tipe_pariwisata')->nullable()->after('provinsi');
            $table->text('deskripsi_singkat')->nullable()->after('deskripsi');
            $table->longText('konten')->nullable()->after('deskripsi_singkat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // --- PERBAIKAN: UBAH MENJADI 'destinasi' ---
        Schema::table('destinasi', function (Blueprint $table) {
            $table->dropColumn(['tipe_pariwisata', 'deskripsi_singkat', 'konten']);
        });
    }
};