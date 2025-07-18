<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\PenukaranHadiahModel;
use App\Models\SiswaModel;
use App\Models\HadiahModel;

class Penukaran extends BaseController
{
    protected $penukaranModel;

    public function __construct()
    {
        $this->penukaranModel = new PenukaranHadiahModel();
    }

    public function index()
    {
        $sekolahId = session('sekolah_id');

        $data['penukaran'] = $this->penukaranModel->getAllWithRelasi($sekolahId);
        return view('adminSekolah/penukaran/index', $data);
    }

    public function create()
    {
        $siswaModel = new SiswaModel();
        $hadiahModel = new HadiahModel();

        $data['siswa'] = $siswaModel->where('sekolah_id', session('sekolah_id'))->findAll();
        $data['hadiah'] = $hadiahModel->findAll();

        return view('adminSekolah/penukaran/create', $data);
    }

    public function store()
    {
        $this->penukaranModel->save([
            'siswa_id'  => $this->request->getPost('siswa_id'),
            'hadiah_id' => $this->request->getPost('hadiah_id'),
            'jumlah'    => $this->request->getPost('jumlah'),
            'status'    => 'belum_diambil'
        ]);

        return redirect()->to(base_url('admin-sekolah/penukaran'))->with('success', 'Penukaran hadiah berhasil dicatat.');
    }
}
