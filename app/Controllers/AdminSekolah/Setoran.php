<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;
use App\Models\SetoranModel;
use App\Models\SiswaModel;

class Setoran extends BaseController
{
    protected $setoranModel;
    protected $siswaModel;

    public function __construct()
    {
        $this->setoranModel = new SetoranModel();
        $this->siswaModel = new SiswaModel();
    }

    // Halaman utama: Daftar setoran
    public function index()
    {
        $sekolahId = session('sekolah_id');
        $data['setoran'] = $this->setoranModel
            ->select('setoran.*, siswa.nama as nama_siswa')
            ->join('siswa', 'siswa.id = setoran.siswa_id')
            ->where('siswa.sekolah_id', $sekolahId)
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        return view('adminSekolah/setoran/index', $data);
    }

    // Form tambah setoran
    public function create()
    {
        $sekolahId = session('sekolah_id');
        if (!$sekolahId) {
            return redirect()->to('/login')->with('error', 'Session tidak valid. Silakan login ulang.');
        }

        $data['siswa'] = $this->siswaModel->where('sekolah_id', $sekolahId)->findAll();
        return view('adminSekolah/setoran/create', $data);
    }

    // Proses simpan setoran baru
    public function store()
    {
        $volume = (int) $this->request->getPost('volume_ml');
        $poin = floor($volume / 1000) * 3;
        $logModel = new \App\Models\LogSetoranModel();
        $logModel->insert([
        'user_id' => session('user_id'),
        'aksi'    => 'Menambahkan setoran',
        'waktu'   => date('Y-m-d H:i:s')
        ]);

        $this->setoranModel->insert([
            'siswa_id'     => $this->request->getPost('siswa_id'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'volume_ml'    => $volume,
            'poin_didapat' => $poin
        ]);

        return redirect()->to('/admin-sekolah/setoran')->with('success', 'Setoran berhasil ditambahkan.');
    }

    // Form edit setoran
    public function edit($id)
    {
        $data['setoran'] = $this->setoranModel->find($id);
        $data['siswa'] = $this->siswaModel->findAll();
        return view('adminSekolah/setoran/edit', $data);
    }

    // Proses update setoran
    public function update($id)
    {
        $volume = (int) $this->request->getPost('volume_ml');
        $poin = floor($volume / 1000) * 3;

        $this->setoranModel->update($id, [
            'siswa_id'     => $this->request->getPost('siswa_id'),
            'tanggal'      => $this->request->getPost('tanggal'),
            'volume_ml'    => $volume,
            'poin_didapat' => $poin
        ]);

        return redirect()->to('/admin-sekolah/setoran')->with('success', 'Setoran berhasil diperbarui.');
    }

    // Hapus data setoran
    public function delete($id)
    {
        $this->setoranModel->delete($id);
        return redirect()->to('/admin-sekolah/setoran')->with('success', 'Setoran berhasil dihapus.');
    }
}
