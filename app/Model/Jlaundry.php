<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jlaundry extends Model
{
    protected $table = 'tb_jlaundry';

    public function trans()
    {
        return $this->hasMany(Transaksi::class);
    }
}
