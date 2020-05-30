<?php

namespace App\Exports;

use App\Model\Transaksi;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TranaksiExport implements FromView
{
    public function view(): View
    {
        return view('exports.exel', [
            'exel' => Transaksi::all()
        ]);
    }
}
