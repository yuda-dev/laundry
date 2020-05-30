<?php

namespace App\Model;

use App\Member;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    
    protected $table = 'tb_costumer';

    public function trans()
    {
        return $this->hasMany(Transaksi::class);
    }
}
