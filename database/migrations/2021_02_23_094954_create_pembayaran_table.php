<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tagihan_id')->constrained('tagihan');
            $table->foreignId('pelanggan_id')->constrained('pelanggan');
            $table->date('tanggal_pembayaran');
            $table->string('bulan_bayar', 10);
            $table->year('tahun_bayar');
            $table->integer('biaya_admin');
            $table->integer('total_bayar');
            $table->foreignId('metode_id')->constrained('metode');
            $table->string('status', 20);
            $table->string('bukti_bayar');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('pembayaran');
    }
}
