<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('nama_kepsek')->nullable()->after('logo');
            $table->string('nip_kepsek')->nullable()->after('nama_kepsek');
            $table->string('nama_waka')->nullable()->after('nip_kepsek');
            $table->string('nuptk_waka')->nullable()->after('nama_waka');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['nama_kepsek', 'nip_kepsek', 'nama_waka', 'nuptk_waka']);
        });
    }
};