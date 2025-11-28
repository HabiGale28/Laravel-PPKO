<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Kategori Berita
        if (!Schema::hasTable('kategori_berita')) {
            Schema::create('kategori_berita', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('slug')->unique();
                $table->timestamps();
            });
        }

        // 2. Tabel Berita (INI YANG MENYEBABKAN ERROR ANDA)
        if (!Schema::hasTable('berita')) {
            Schema::create('berita', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('slug')->unique();
                $table->longText('konten');
                $table->string('gambar')->nullable();
                $table->enum('status', ['publish', 'draft'])->default('draft');
                
                // Relasi (Nullable agar tidak error jika data induk dihapus)
                $table->foreignId('kategori_id')->nullable()->constrained('kategori_berita')->nullOnDelete();
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                
                $table->timestamps();
            });
        }

        // 3. Tabel Pengumuman
        if (!Schema::hasTable('pengumuman')) {
            Schema::create('pengumuman', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('slug')->unique();
                $table->longText('konten');
                $table->string('gambar')->nullable();
                $table->date('tanggal_publish')->default(now());
                $table->enum('status', ['publish', 'draft'])->default('draft');
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();
            });
        }

        // 4. Tabel Event
        if (!Schema::hasTable('event')) {
            Schema::create('event', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->string('slug')->unique();
                $table->string('lokasi')->nullable();
                $table->date('tanggal_mulai');
                $table->date('tanggal_selesai')->nullable();
                $table->text('deskripsi_singkat')->nullable();
                $table->longText('konten')->nullable();
                $table->string('gambar')->nullable();
                $table->enum('status', ['publish', 'draft'])->default('draft');
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('event');
        Schema::dropIfExists('pengumuman');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('kategori_berita');
    }
};