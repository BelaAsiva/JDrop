<?php

namespace App\Controllers\AdminDLH;

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
        $userId = session()->get('user_id');
        $role   = session()->get('role');

        // Ambil semua notifikasi yang ditujukan ke DLH
        $data['notifikasi'] = $this->notifikasiModel
            ->where('user_id', $userId)
            ->where('penerima_role', $role) // pastikan hanya yg untuk DLH
            ->orderBy('waktu_kirim', 'DESC')
            ->findAll();

        return view('adminDLH/notifikasi/index', $data);
    }

    public function detail($id)
    {
        $notifikasi = $this->notifikasiModel->find($id);

        if (!$notifikasi) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Notifikasi tidak ditemukan.');
        }

        // Tandai sebagai dibaca jika belum
        if (!$notifikasi['dibaca']) {
            $this->notifikasiModel->update($id, ['dibaca' => 1]);
        }

        return view('adminDLH/notifikasi/detail', ['notifikasi' => $notifikasi]);
    }

    public function balas($id)
    {
        $notifLama = $this->notifikasiModel->find($id);

        if (!$notifLama) {
            return redirect()->back()->with('error', 'Notifikasi asal tidak ditemukan.');
        }

        $pesanBalasan = $this->request->getPost('pesan');

        // Simpan balasan ke user pengirim lama
        $this->notifikasiModel->insert([
            'user_id'        => $notifLama['user_id'],              // ke pengirim awal
            'judul'          => 'Balasan: ' . $notifLama['judul'],
            'pesan'          => $pesanBalasan,
            'dibaca'         => 0,
            'waktu_kirim'    => date('Y-m-d H:i:s'),
            'pengirim_role'  => 'dlh',
            'penerima_role'  => 'sekolah'
        ]);

        return redirect()->to(base_url('admin-dlh/notifikasi'))
            ->with('success', 'Balasan berhasil dikirim.');
    }

    public function kirim()
    {
        $userId = $this->request->getPost('user_id');
        $judul  = $this->request->getPost('judul');
        $pesan  = $this->request->getPost('pesan');

        $this->notifikasiModel->insert([
            'user_id'        => $userId,
            'judul'          => $judul,
            'pesan'          => $pesan,
            'waktu_kirim'    => date('Y-m-d H:i:s'),
            'dibaca'         => 0,
            'pengirim_role'  => 'dlh',
            'penerima_role'  => 'sekolah'
        ]);

        return redirect()->to('/admin-dlh/notifikasi')
            ->with('success', 'Pesan berhasil dikirim.');
    }
}
