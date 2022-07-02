<?php

namespace App\Imports;

use App\Models\Medicine;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;

class MedicineImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Medicine([
        'name'=> $row['name'],
        'type'=> $row['type'],
        'dosage'=> $row['dosage'],
        'people'=> $row['people'],
        'pharmacy_id'=> Session::get('loginId'),
        ]);
    }
}
