<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\SekolahModel;
use App\Models\SetoranModel;
use App\Models\NotifikasiModel;
use App\Models\PengambilanModel;
use App\Models\LogSetoranModel;
use App\Models\LogAktivitasModel;
use App\Models\LogLoginModel;

class Dashboard extends BaseController
{
    protected $setoranModel;
    protected $notifModel;

    public function __construct()
    {
        $this->setoranModel = new SetoranModel();
        $this->notifModel = new NotifikasiModel();
    }

    public function index()
    {
        $userId = session('user_id');

        $data['notifikasi'] = $this->notifModel->getByUser($userId);

        $siswaModel = new SiswaModel();
        $pengambilanModel = new PengambilanModel();

        $data['totalSekolah'] = $siswaModel->select('sekolah_id')->distinct()->countAllResults();
        $data['totalPengambilan'] = $pengambilanModel->countAllResults();
        $data['peringkatSekolah'] = $this->setoranModel->getRankingSekolah();

        return view('adminDLH/dashboard', $data);
    }
}
