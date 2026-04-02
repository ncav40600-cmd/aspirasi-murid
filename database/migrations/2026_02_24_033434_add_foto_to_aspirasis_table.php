<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            // Menambahkan kolom foto setelah kolom keterangan jika belum ada
            if (!Schema::hasColumn('aspirasi', 'foto')) {
                $table->string('foto')->nullable()->after('keterangan');
            }
        });
    }

    public function down()
    {
        Schema::table('aspirasi', function (Blueprint $table) {
            // Menghapus kolom foto jika migration di-rollback
            $table->dropColumn('foto');
        });
    }
};