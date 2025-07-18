<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\PengambilanModel;
use App\Models\SekolahModel;

class Pengambilan extends BaseController
{
    protected $pengambilanModel;

    public function __construct()
    {
        $this->pengambilanModel = new PengambilanModel();
    }

    public function index()
    {
        $data['pengambilan'] = $this->pengambilanModel->getAllWithSekolah();
        return view('adminDLH/pengambilan/index', $data);
    }

    public function validasi($id)
    {
        $this->pengambilanModel->update($id, ['status_dlh' => 1]);

        return redirect()->to(base_url('admin-dlh/pengambilan'))->with('success', 'Pengambilan berhasil divalidasi.');
    }

    public function batalkan($id)
    {
        $this->pengambilanModel->update($id, ['status_dlh' => 0]);

        return redirect()->to(base_url('admin-dlh/pengambilan'))->with('success', 'Validasi DLH dibatalkan.');
    }
}
