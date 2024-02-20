<?php

namespace App\Imports;

use App\Models\Computo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ComputosImport implements ToModel, WithHeadingRow,WithBatchInserts,WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
{
        return new Computo([

            //
            'tipo'=> $row['tipo'],
            'serie'=> $row['serie'],
            'folio'=> $row['folio'],
            'cargador'=> $row['cargador'],
            'descripcion'=> $row['descripcion'],
            'id_colaborador'=>1
        ]);
    }
    public function batchSize(): int
    {
        return 2000;
    }

    public function chunkSize(): int
    {
        return 2000;
    }

    public function rules(): array
    {
        return[
            '*.tipo'=>[
                'string',
                'required'
            ],
            '*.serie'=>[
                'string',
                'required'
            ],
            '*.folio'=>[
                'string',
                'required'
            ],
            '*.cargador'=>[
                'string',
                'required'
            ],
            '*.descripcion'=>[
                'string',
                'required'
            ],
        ];
    }


}
