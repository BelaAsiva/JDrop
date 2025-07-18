<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\SetoranModel;
use App\Models\SiswaModel;

class Dashboard extends BaseController
{
    protected $setoranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->setoranModel = new SetoranModel();
        $this->siswaModel   = new SiswaModel();
    }

    public function index()
    {
        $sekolahId = session('sekolah_id');

        // Statistik utama
        $totalSiswa = $this->siswaModel->where('sekolah_id', $sekolahId)->countAllResults();
        $totalLiter = $this->setoranModel
                           ->join('siswa', 'siswa.id = setoran.siswa_id')
                           ->where('siswa.sekolah_id', $sekolahId)
                           ->selectSum('volume_ml')
                           ->first()['volume_ml'] ?? 0;

        $totalKoin = $this->setoranModel
                          ->join('siswa', 'siswa.id = setoran.siswa_id')
                          ->where('siswa.sekolah_id', $sekolahId)
                          ->selectSum('poin_didapat')
                          ->first()['poin_didapat'] ?? 0;

        // Ambil data Top 5 pengumpul jelantah
        $peringkat = $this->setoranModel->getTopPengumpul($sekolahId);

        return view('adminSekolah/dashboard', [
            'username'     => session('username'),
            'totalSiswa'   => $totalSiswa,
            'totalLiter'   => $totalLiter / 1000, // ml → liter
            'totalKoin'    => $totalKoin,
            'peringkat'    => $peringkat
        ]);
    }
}
