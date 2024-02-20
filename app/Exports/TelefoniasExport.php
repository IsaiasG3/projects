<?php

namespace App\Exports;

use App\Models\Telefonia;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TelefoniasExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exportar2',[
            'telefonia' => Telefonia::get()
        ]);
    }
}
