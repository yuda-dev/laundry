<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_transaksi', function (Blueprint $table) {
            $table->string('nama')->after('id');
            $table->string('email')->after('nama')->unique();
            $table->integer('no_hp')->after('email');
            $table->text('alamat')->after('no_hp');
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
