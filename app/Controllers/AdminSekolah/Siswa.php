<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\SekolahModel;

class Siswa extends BaseController
{
    protected $siswaModel;
    protected $sekolahModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->sekolahModel = new SekolahModel();
    }

    public function index()
    {
        $data['siswa'] = $this->siswaModel->getSiswaWithSekolah();
        return view('adminSekolah/siswa/index', $data);
    }

    public function create()
    {
        $data['sekolah'] = $this->sekolahModel->findAll();
        return view('adminSekolah/siswa/create', $data);
    }

    public function store()
    {
        $data = [
            'sekolah_id' => $this->request->getPost('sekolah_id'),
            'nama'       => $this->request->getPost('nama'),
            'nisn'       => $this->request->getPost('nisn'),
        ];

        if ($this->siswaModel->insert($data)) {
            return redirect()->to('/admin-sekolah/siswa')->with('success', 'Data siswa berhasil ditambahkan.');
        } else {
            return redirect()->to('/admin-sekolah/siswa')->with('error', 'Gagal menambahkan data siswa.');
        }
    }

    public function delete($id)
    {
        $this->siswaModel->delete($id);
        return redirect()->to('/admin-sekolah/siswa');
    }

    public function edit($id)
    {
        $data['siswa'] = $this->siswaModel->find($id);
        $data['sekolah'] = $this->sekolahModel->findAll();
        return view('adminSekolah/siswa/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama'       => $this->request->getPost('nama'),
            'nisn'       => $this->request->getPost('nisn'),
            'sekolah_id' => $this->request->getPost('sekolah_id'),
        ];

        if ($this->siswaModel->update($id, $data)) {
            return redirect()->to('/admin-sekolah/siswa')->with('success', 'Data siswa berhasil diperbarui.');
        } else {
            return redirect()->to('/admin-sekolah/siswa')->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }
}
