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
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->date('tgl_pesan');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('jumlah_total');
            $table->text('pesan');
            $table->enum('pinjam_status', ['0', '1'])->default('0');
            $table->enum('status', ['setuju', 'pinjam', 'batal', 'kembali', 'denda', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};
