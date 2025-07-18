<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\SekolahModel;
use App\Models\UserModel;
use App\Models\NotifikasiModel;

class ValidasiSekolah extends BaseController
{
    protected $sekolahModel;
    protected $userModel;
    protected $notifModel;

    public function __construct()
    {
        $this->sekolahModel = new SekolahModel();
        $this->userModel = new UserModel();
        $this->notifModel = new NotifikasiModel();
    }

    public function index()
    {
        $data['sekolah'] = $this->userModel
            ->where('role', 'sekolah')
            ->where('sekolah_id', null)
            ->findAll();

        return view('adminDLH/validasi/index', $data);
    }

    public function terima($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        // Cari sekolah yang sesuai dari input atau buat dummy ID sekolah 1
        $sekolahId = 1; // Gantilah sesuai logika sebenarnya

        $this->userModel->update($id, ['sekolah_id' => $sekolahId]);

        $this->notifModel->insert([
            'user_id' => $id,
            'judul' => 'Validasi Diterima',
            'pesan' => 'Akun sekolah Anda telah divalidasi oleh Admin DLH.',
            'dibaca' => 0,
            'waktu_kirim' => date('Y-m-d H:i:s')
        ]);

        return redirect()->back()->with('success', 'Sekolah berhasil divalidasi.');
    }

    public function tolak($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan');
        }

        $this->notifModel->insert([
            'user_id' => $id,
            'judul' => 'Validasi Ditolak',
            'pesan' => 'Maaf, akun sekolah Anda tidak lolos validasi.',
            'dibaca' => 0,
            'waktu_kirim' => date('Y-m-d H:i:s')
        ]);

        $this->userModel->delete($id);

        return redirect()->back()->with('success', 'Pendaftaran sekolah ditolak dan akun dihapus.');
    }
}
