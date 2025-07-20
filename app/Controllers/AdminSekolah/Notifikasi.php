<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    protected $notifikasiModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
    }

    public function index()
    {
        // Ambil user login & role dari session
        $userId = session()->get('user_id');
        $userRole = session()->get('role');

        // Ambil notifikasi yang ditujukan ke sekolah ini
        $data['notifikasi'] = $this->notifikasiModel
            ->where('user_id', $userId)
            ->where('penerima_role', $userRole) // pastikan ke role 'sekolah'
            ->orderBy('waktu_kirim', 'DESC')
            ->findAll();

        // Tandai semua sebagai dibaca
        $this->notifikasiModel
            ->where('user_id', $userId)
            ->set('dibaca', 1)
            ->update();

        return view('adminSekolah/notifikasi', $data);
    }
}
