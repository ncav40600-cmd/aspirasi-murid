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
        if (!Schema::hasTable('kategori')) {
            Schema::create('kategori', function (Blueprint $table) {
                $table->id('id_kategori');
                $table->string('keterangan');
            });
        }

        // Tambahkan constraint fk ke aspirasi setelah kategori tersedia.
        if (Schema::hasTable('aspirasi')) {
            Schema::table('aspirasi', function (Blueprint $table) {
                if (Schema::hasColumn('aspirasi', 'id_kategori')) {
                    try {
                        $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
                    } catch (\Exception $e) {
                        // constraint mungkin sudah ada; abaikan.
                    }
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};