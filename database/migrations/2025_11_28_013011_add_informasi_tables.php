<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Tabel Kategori Berita (Jika belum ada)
        if (!Schema::hasTable('kategori_berita')) {
            Schema::create('kategori_berita', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('slug')->unique();
                $table->timestamps();
            });
        }

        // 2. Update Tabel Berita (Tambah relasi kategori jika belum ada)
        if (Schema::hasTable('berita')) {
            if (!Schema::hasColumn('berita', 'kategori_id')) {
                Schema::table('berita', function (Blueprint $table) {
                    $table->foreignId('kategori_id')->nullable()->constrained('kategori_berita')->nullOnDelete();
                });
            }
        }

        // 3. Tabel Pengumuman (Jika belum ada)
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

        // 4. Tabel Event (Jika belum ada)
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
        // Tidak perlu drop table jika kita hanya menambahkan (opsional, bisa dikosongkan)
    }
};