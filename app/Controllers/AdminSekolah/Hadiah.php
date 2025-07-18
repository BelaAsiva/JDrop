<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\HadiahModel;

class Hadiah extends BaseController
{
    protected $hadiahModel;

    public function __construct()
    {
        $this->hadiahModel = new HadiahModel();
    }

    public function index()
    {
        $data['hadiah'] = $this->hadiahModel->findAll();
        return view('adminSekolah/hadiah/index', $data);
    }

    public function create()
    {
        return view('adminSekolah/hadiah/create');
    }

    public function store()
    {
        $this->hadiahModel->insert([
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'stok' => $this->request->getPost('stok'),
            'poin_dibutuhkan' => $this->request->getPost('poin_dibutuhkan'),
        ]);

        return redirect()->to('/admin-sekolah/hadiah')->with('success', 'Hadiah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['hadiah'] = $this->hadiahModel->find($id);
        return view('adminSekolah/hadiah/edit', $data);
    }

    public function update($id)
    {
        $this->hadiahModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'stok' => $this->request->getPost('stok'),
            'poin_dibutuhkan' => $this->request->getPost('poin_dibutuhkan'),
        ]);

        return redirect()->to('/admin-sekolah/hadiah')->with('success', 'Hadiah berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->hadiahModel->delete($id);
        return redirect()->to('/admin-sekolah/hadiah')->with('success', 'Hadiah berhasil dihapus.');
    }
}
