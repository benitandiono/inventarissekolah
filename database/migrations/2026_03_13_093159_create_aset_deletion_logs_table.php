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
        Schema::create('aset_deletion_logs', function (Blueprint $table) {
            $table->id();

            // Data snapshot aset yang dihapus
            $table->string('nama_aset');
            $table->integer('jumlah')->default(0);
            $table->string('kondisi')->nullable();    // pemegang aset
            $table->string('lokasi')->nullable();
            $table->string('gambar')->nullable();     // path gambar (snapshot)

            // Info penghapusan
            $table->text('alasan_hapus');             // alasan wajib diisi
            $table->unsignedBigInteger('deleted_by'); // user yang menghapus
            $table->string('deleted_by_name');        // snapshot nama user
            $table->timestamp('deleted_at_log');      // waktu penghapusan

            $table->timestamps();

            $table->foreign('deleted_by')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_deletion_logs');
    }
};