<?php

namespace App\Controllers;

class Page extends BaseController
{

public function index() 
{
    echo "ini adalah page";
}
public function fungsi()
{
    echo "fungsi coy di page";
}
public function tampilnama(){
    $nama = "Laksa";
    echo "DI page Nama saya ".$nama;
}


public function tampilparameter($nama="", $alamat=""){

    echo 'nama saya '.$nama." alamat saya ".$alamat;
    return view('template/template');
}
public function parameterUmur($umur){
    echo 'umur saya '.$umur;
}

public function mahasiswa(){
    $data['nama']="Laksa";
    $data['alamat']= "Medan";
    return view('mahasiswa/v_mahasiswa', $data);
}

public function matakuliah(){
    $data['matkul']="Pemrograman Web Lanjut";
    $data['sks']= 3;
    return view('matakuliah/v_matakuliah', $data);
}

public function dosen(){
    $data['ndosen']="Bapak Ismael";
    $data['matkul']= "Pemrograman Web Lanjut";
    return view('dosen/v_dosen', $data);
}
}