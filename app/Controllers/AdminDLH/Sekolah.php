<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\SekolahModel;

class Sekolah extends BaseController
{
    protected $sekolahModel;

    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
    }

    public function index()
    {
        $data['sekolah'] = $this->sekolahModel->findAll();
        return view('adminDLH/sekolah/index', $data);
    }

    public function create()
    {
        return view('adminDLH/sekolah/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama'   => 'required|min_length[3]',
            'alamat' => 'required',
            'kontak' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->sekolahModel->save($this->request->getPost());

        return redirect()->to('/sekolah')->with('success', 'Data sekolah berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $data['sekolah'] = $this->sekolahModel->find($id);
        return view('adminDLH/sekolah/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama'   => 'required|min_length[3]',
            'alamat' => 'required',
            'kontak' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->sekolahModel->update($id, $this->request->getPost());

        return redirect()->to('/sekolah')->with('success', 'Data sekolah berhasil diperbarui.');
    }


    public function delete($id)
    {
        if ($this->sekolahModel->delete($id)) {
            return redirect()->to('/sekolah')->with('success', 'Data sekolah berhasil dihapus.');
        } else {
            return redirect()->to('/sekolah')->with('error', 'Gagal menghapus data sekolah.');
        }
    }
}
