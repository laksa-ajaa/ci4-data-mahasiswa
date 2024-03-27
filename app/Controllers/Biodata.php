<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Biodata extends BaseController
{
    public function tampilbiodata()
    {
    $biodata =[
        'nama' => 'Laksmana Chairutama',
        'alamat' => 'Medan',
        'umur' => 19,
        'prodi' => 'Teknologi Rekayasa Perangkat lunak',
        'cita2' => 'Fullstack web developer'
    ];
    return view('tampilbiodata', $biodata);
    }
}
