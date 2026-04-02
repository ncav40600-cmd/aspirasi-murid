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
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id('id_aspirasi');
            $table->unsignedBigInteger('user_id');
            $table->string('email_siswa');
            $table->boolean('is_anonymous')->default(false);
            $table->unsignedBigInteger('id_kategori');
            $table->text('keterangan');
            $table->string('foto')->nullable();
            $table->string('lokasi');
            $table->string('status')->default('Baru');
            $table->text('umpan_balik')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};