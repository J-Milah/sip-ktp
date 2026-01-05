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
        Schema::create('rekam_ktp', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rekam');
            $table->char('nik_rekam', 16);
            $table->string('alamat')->nullable();
            $table->char('rt', 3);
            $table->date('tanggal_rekam');
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
        Schema::dropIfExists('rekam_ktp');
    }
};
