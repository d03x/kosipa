<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pinjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('jumlah');
            $table->float('bunga');
            $table->integer('tenor');
            $table->date('tanggal_jatuh_tempo');
            $table->date('tanggal');
            $table->integer('angsuran_per_bln');
            $table->integer('sisa_pinjaman');
            $table->text('keterangan');
            $table->integer('biaya_admin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pinjamen');
    }
};
