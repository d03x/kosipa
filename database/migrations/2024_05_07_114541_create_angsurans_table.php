<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pinjaman_id');
            $table->string('no');
            $table->string('jumlah');
            $table->string('keterangan');
            $table->string('ke');
            $table->string('status');
            $table->dateTime('waktu_bayar');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('angsurans');
    }
};
