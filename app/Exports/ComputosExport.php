<?php

namespace App\Exports;

use App\Models\Computo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ComputosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exportar',[
            'computo' => Computo::get()
        ]);
    }
}
