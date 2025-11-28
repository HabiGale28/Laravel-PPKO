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
        // KITA UBAH MENJADI 'destinasi' (singular)
        Schema::create('destinasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 200);
            $table->string('slug', 200)->unique();
            $table->string('lokasi', 200);
            $table->string('provinsi', 100);
            $table->text('deskripsi')->nullable();
            $table->integer('wisata')->default(0);
            $table->integer('kebudayaan')->default(0);
            $table->integer('event')->default(0);
            $table->string('gambar_utama')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('jumlah_review')->default(0);
            $table->decimal('harga_mulai', 12, 2)->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->enum('status', ['publish', 'draft', 'archived'])->default('publish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi');
    }
};