<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'tb_diskon';

    public function trans()
    {
        return $this->hasMany(Transaksi::class);
    }
}
