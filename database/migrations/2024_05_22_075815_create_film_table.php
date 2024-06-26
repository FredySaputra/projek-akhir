<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('film', function (Blueprint $table) {
            $table->string('film_id')->primary();
            $table->string('judul');
            $table->string('genre');
            $table->string('durasi');
            $table->date('tgl_rilis');
            $table->string('deskripsi');
            $table->string('cover');
        });

        Schema::table('film', function (Blueprint $table) {
            $table->string('cover'); // Menambahkan kolom baru
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film');
    }
};
