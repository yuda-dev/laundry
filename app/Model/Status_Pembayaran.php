<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status_Pembayaran extends Model
{
    protected $table = 'tb_status_pembayaran';

    public function trans()
    {
        return $this->hasMany(Transaksi::class);
    }
}
