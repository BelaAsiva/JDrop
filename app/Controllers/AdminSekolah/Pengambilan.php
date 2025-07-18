<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\PengambilanModel;

class Pengambilan extends BaseController
{
    protected $pengambilanModel;

    public function __construct()
    {
        $this->pengambilanModel = new PengambilanModel();
    }

    public function index()
    {
        $sekolahId = session('sekolah_id');
        $data['pengambilan'] = $this->pengambilanModel->getBySekolah($sekolahId);
        return view('adminSekolah/pengambilan/index', $data);
    }

    public function create()
    {
        return view('adminSekolah/pengambilan/create');
    }

    public function edit($id)
    {
        $pengambilan = $this->pengambilanModel->find($id);

        if ($pengambilan['status_dlh'] != 0) {
            return redirect()->to('/admin-sekolah/pengambilan')->with('error', 'Ajuan sudah dikonfirmasi dan tidak bisa diedit.');
        }

        $data['pengambilan'] = $pengambilan;
        return view('adminSekolah/pengambilan/edit', $data);
    }

    public function delete($id)
    {
        $pengambilan = $this->pengambilanModel->find($id);

        if ($pengambilan['status_dlh'] != 0) {
            return redirect()->to('/admin-sekolah/pengambilan')->with('error', 'Ajuan sudah dikonfirmasi dan tidak bisa dihapus.');
        }

        $this->pengambilanModel->delete($id);
        return redirect()->to('/admin-sekolah/pengambilan')->with('success', 'Ajuan berhasil dihapus.');
    }

    public function update($id)
    {
        $pengambilan = $this->pengambilanModel->find($id);

        if ($pengambilan['status_dlh'] != 0) {
            return redirect()->to('/admin-sekolah/pengambilan')->with('error', 'Ajuan sudah dikonfirmasi dan tidak bisa diubah.');
        }

        $this->pengambilanModel->update($id, [
            'bulan' => $this->request->getPost('bulan'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/admin-sekolah/pengambilan')->with('success', 'Ajuan berhasil diperbarui.');
    }


    public function store()
    {
        $sekolahId  = session('sekolah_id');
        $bulan      = $this->request->getPost('bulan');
        $keterangan = $this->request->getPost('keterangan');

        // Simpan pengajuan
        $this->pengambilanModel->insert([
            'sekolah_id'      => $sekolahId,
            'bulan'           => $bulan,
            'status_sekolah'  => 1,
            'status_dlh'      => 0,
            'keterangan'      => $keterangan,
        ]);

        // Ambil nama sekolah dari session atau query
        $db = \Config\Database::connect();
        $query = $db->table('sekolah')->where('id', $sekolahId)->get()->getRow();
        $namaSekolah = $query ? $query->nama : 'Sekolah Tidak Diketahui';

        // Ambil semua user DLH
        $userDlh = $db->table('users')->where('role', 'dlh')->get()->getResult();

        $notifModel = new \App\Models\NotifikasiModel();

        foreach ($userDlh as $dlh) {
            $notifModel->insert([
                'user_id' => $dlh->id,
                'judul' => 'Pengajuan Pengambilan Baru',
                'pesan' => 'Sekolah ' . $namaSekolah . ' mengajukan pengambilan bulan ' . $bulan,
                'dibaca' => 0,
                'waktu_kirim' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->to('/admin-sekolah/pengambilan')->with('success', 'Pengajuan berhasil dikirim.');
    }
}
