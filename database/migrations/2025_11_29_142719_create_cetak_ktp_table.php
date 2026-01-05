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
        Schema::create('cetak_ktp', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pao');
            $table->char('nik_cetak', 16);
            $table->string('nama_cetak');
            $table->char('rt', 3);
            $table->enum('ket_cetak', ['PRR', 'Perubahan Data', 'Rusak', 'Hilang']);
            $table->enum('status_cetak', ['Proses', 'Selesai'])->default('Proses');
            $table->date('tanggal_pao');
            $table->date('tanggal_selesai')->nullable();
            $table->date('tanggal_ambil')->nullable();
            $table->string('tanda_terima')->nullable();
            $table->text('keterangan')->nullable();
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('id_lurah')->constrained('kelurahan', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cetak_ktp');
    }
};
