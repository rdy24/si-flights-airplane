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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plane_id')->constrained('planes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('route_id')->constrained('routes')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('waktu_berangkat');
            $table->dateTime('waktu_tiba');
            $table->enum('status', ['Menunggu Jadwal', 'Sedang Terbang']);
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
        Schema::dropIfExists('schedules');
    }
};
