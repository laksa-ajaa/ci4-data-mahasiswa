<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMahasiswa;
use App\Models\Prodi;
use CodeIgniter\HTTP\ResponseInterface;

class Mahasiswa extends BaseController
{

    public function index()
    {
        $mhsModel = new ModelMahasiswa();
        $prodi = new Prodi();
        $data = [
            'mahasiswa' => $mhsModel->findAll(),
            'prodi' => $prodi->getJurusanProdi()
        ];

        return view('mahasiswa/v_mahasiswa', $data);
    }

    public function tambahdata()
    {
        $nim = $this->request->getVar('nim');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $jenkel = $this->request->getVar('jenkel');
        $idjurusan = explode('-', $this->request->getVar('prodi'));
        $data = [
            'nim' => $nim,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenkel' => $jenkel,
            'id_jurusan' => $idjurusan[0],
            'kode_prodi' => $idjurusan[1]
        ];
        $mhsModel = new ModelMahasiswa();


        $ada = $mhsModel->where('nim', $nim)->first();
        if (!$ada) {
            $mhsModel->insert($data);
            return redirect()->to('mahasiswa')->with('success', 'Data Mahasiswa Berhasil ditambah');
        } else {
            return redirect()->to('mahasiswa')->with('error', 'NIM sudah ada di database');
        }
    }
    public function updatedata()
    {
        $nim = $this->request->getVar("nim-e");
        $nama = $this->request->getVar("nama");
        $alamat = $this->request->getVar("alamat");
        $jk = $this->request->getVar("jenkel");
        $idjurusan = explode("-", $this->request->getVar("prodi"));

        $data = [
            "nim" => $nim,
            "nama" => $nama,
            "alamat" => $alamat,
            "jenkel" => $jk,
            "id_jurusan" => $idjurusan[0],
            "kode_prodi" => $idjurusan[1]
        ];
        $mhsModel = new ModelMahasiswa();
        $mhsModel->update($nim, $data);

        return redirect()->to("/mahasiswa")->with("success", "Data mahasiswa berhasil diubah");
    }

    public function hapusdata()
    {
        $nim = $this->request->getVar("nim");
        $mhsModel = new ModelMahasiswa();
        $mhsModel->delete($nim);

        return redirect()->to("/mahasiswa")->with("success", "Data mahasiswa berhasil dihapus");
    }
}
