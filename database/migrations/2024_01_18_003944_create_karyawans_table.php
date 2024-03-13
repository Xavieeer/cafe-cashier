<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip');
            $table->string('nik');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['perempuan', 'laki - laki']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('telpon');
            $table->string('agama');
            $table->enum('status_nikah', ['belum nikah', 'nikah']);
            $table->text('alamat');
            $table->string('foto');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
