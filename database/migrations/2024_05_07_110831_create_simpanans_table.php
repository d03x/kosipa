<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_simpanan_id');
            $table->integer('jumlah');
            $table->boolean('status');
            $table->date('tanggal');
            $table->foreignId('user_id');
            $table->longText('keterangan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('simpanans');
    }
};
