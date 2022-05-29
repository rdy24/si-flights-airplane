<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('airline_id')->constrained('airlines')->onUpdate('cascade')->onDelete('cascade');
            $table->string('kode_pesawat')->unique();
            $table->string('gambar');
            $table->string('nama');
            $table->date('tanggal_pembuatan');
            $table->date('tanggal_operasional');
            $table->date('tanggal_kadaluarsa');
            $table->enum('status', ['Siap Terbang', 'Dalam Perawatan']);
            $table->integer('kuota');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planes');
    }
};
