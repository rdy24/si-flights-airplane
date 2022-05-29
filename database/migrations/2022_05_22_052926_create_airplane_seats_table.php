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
        Schema::create('airplane_seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plane_id')->constrained('planes')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('kelas_kursi', ['Ekonomi', 'Bisnis', 'First']);
            $table->integer('kuota');
            $table->integer('harga');
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
        Schema::dropIfExists('airplane_seats');
    }
};
