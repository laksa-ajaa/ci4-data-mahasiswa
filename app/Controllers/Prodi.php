<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Prodi as ModelProdi;
use App\Models\Jurusan as ModelJurusan;

class Prodi extends BaseController
{
    public function index()
    {
        $mhsProdi = new ModelProdi();
        $mhsJurusan = new ModelJurusan();
        $data = [
            'prodi' => $mhsProdi->getJurusanProdi(),
            'jurusan' => $mhsJurusan->findAll()
        ];
        return view('prodi/v_prodi', $data);
    }

    public function tambahdata()
    {
        $id_jurusan = $this->request->getVar('jurusan');
        $kode_prodi = $this->request->getVar('kode_prodi');
        $nama_prodi = $this->request->getVar('nama_prodi');
        $data = [
            'id_jurusan' => $id_jurusan,
            'kode_program_studi' => $kode_prodi,
            'nama_program_studi' => $nama_prodi
        ];
        $mhsProdi = new ModelProdi();
        $mhsProdi->insert($data);
        return redirect()->to('prodi')->with('success', 'Data Prodi Berhasil ditambah');
    }
}
