<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'first_name'     => $row[0],
            'last_name'     => $row[1],
            'code'     => $row[2],
            'phone_number'     => $row[3],
            'username'     => $row[4],
            'email'    => $row[5],
            'password' => Hash::make($row[6]),
        ]);
    }
}
