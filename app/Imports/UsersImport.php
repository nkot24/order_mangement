<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] === 'id' || empty($row[1])) return null; // skip header or empty rows

        return new User([
            'id' => $row[0],
            'name' => $row[1],
            'role' => in_array($row[2], ['admin', 'worker']) ? $row[2] : 'worker', // validate role
            'password' => Hash::make($row[3] ?? 'default123'), // ensure password is hashed
            'visible_password' => $row[3] ?? 'default123',
            'created_at' => $row[4] ?? now(),
            'updated_at' => $row[5] ?? now(),
        ]);
    }
}
