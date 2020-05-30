<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->integer('status_pesanan_id')->after('total')->default('1');
            $table->integer('status_pembayaran_id')->after('status_pesanan_id')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            //
        });
    }
}
