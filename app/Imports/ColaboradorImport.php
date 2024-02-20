<?php

namespace App\Imports;

use App\Models\Colaborador;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ColaboradorImport implements ToModel, WithHeadingRow,WithBatchInserts,WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Colaborador([

            //
            'nombres'=> $row['nombres'],
            'apellidos'=> $row['apellidos'],
            'numero'=> $row['numero'],
            'id_cliente'=>1,
            'estado'=>'Activo'
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
            '*.nombres'=>[
                'string',
                'required'
            ],
            '*.apellidos'=>[
                'string',
                'required'
            ],
            '*.numero'=>[

                'required'
            ]

        ];
    }
}
