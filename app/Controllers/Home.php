<?php

namespace App\Controllers;

class Home extends BaseController
{

public function index() 
{
    return view('template/v_template');
}
public function fungsi()
{
    echo "fungsi coy";
}
public function tampilnama(){
    $nama = "Laksa";
    echo "Nama saya ".$nama;
}
public function kirimdataview() {
    // $data['nama']="Laksa";
    // $datas['alamat']="binjai";
  
    $data=[
        'nama' => 'Laksa',
        'alamat' => 'Medan'
    ];
 

    return view('tampildata', $data);
}
}