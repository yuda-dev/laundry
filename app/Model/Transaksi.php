<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{

    protected $table = 'tb_transaksi';

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function jlaundry()
    {
        return $this->belongsTo(Jlaundry::class);
    }

    public function status_paket()
    {
        return $this->belongsTo(Status_Paket::class);
    }

    public function status_pesanan()
    {
        return $this->belongsTo(Status_Pesanan::class);
    }

    public function status_pembayaran()
    {
        return $this->belongsTo(Status_Pembayaran::class);
    }

    public function diskon()
    {
        return $this->belongsTo(Diskon::class);
    }
}
