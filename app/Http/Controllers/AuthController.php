<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return 
        [
            "NIS" => 3103119066,
            "Nama" => 'Fahmi Aji Wicaksono',
            "Gender" => 'Laki-Laki',
            "Phone" => 62832415156678,
            "Class" => 'XII RPL 2'

        ];
    }  
}
