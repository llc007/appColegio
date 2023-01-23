<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Http\Controllers\NormalizarTextoController;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nombreCompleto=app(NormalizarTextoController::class)->noTildes($row['paterno'].' '.$row['materno'].' '.$row['nombre']);
        return new User([
//            //
            'rut'=>$row['rut'],
            'paterno'=>$row['paterno'],
            'materno'=>$row['materno'],
            'name'=>$row['nombre'],
            'nombrecompleto'=>$nombreCompleto,
            'email'=>strtolower($row['paterno'].$row['materno'].$row['nombre']).'@test.com',
            'password'=>Hash::make('123456nh'),
            'dv'=>"1"
        ]);
    }
}
