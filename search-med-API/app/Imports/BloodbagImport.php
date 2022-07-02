<?php

namespace App\Imports;

use App\Models\Bloodbag;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;

class BloodbagImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Bloodbag([
            'bloodGroup'=> $row['bloodgroup'],
            'volume'=> $row['volume'],
            'quantity'=> $row['quantity'],
            'hopital_id'=> Session::get('loginId'),
            ] );
    }
}
