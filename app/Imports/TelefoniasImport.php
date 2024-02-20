<?php

namespace App\Imports;

use App\Models\Telefonia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TelefoniasImport implements ToModel,WithHeadingRow,WithBatchInserts,WithChunkReading,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Telefonia([
                'modelo'=> $row['modelo'],
                'marca'=> $row['marca'],
                'imci'=> $row['imei'],
                'serie'=> $row['serie'],
                'sim'=> $row['sim'],
                'tel_cerebrit0'=> $row['tel_cerebrit0'],
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
                '*.modelo'=>[

                    'string',
                    'required'
                ],
                '*.serie'=>[

                    'required'
                ],
                '*.marca'=>[
                    'string',
                    'required'
                ],
                '*.imei'=>[
                    'required',

                ],
                '*.sim'=>[

                    'required'
                ],
                '*.tel_cerebrit0'=>[

                    'required'
                ],
            ];
        }

}
