<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status_Pesanan extends Model
{
    protected $table = 'tb_status_pesanan';

    public function trans()
    {
        return $this->hasMany(Transaksi::class);
    }
}
