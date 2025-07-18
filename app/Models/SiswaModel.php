<?php

namespace App\Models;
use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sekolah_id', 'nama', 'nisn'];

    // Tambahkan method ini untuk join dengan tabel sekolah
    public function getSiswaWithSekolah()
    {
        return $this->select('siswa.*, sekolah.nama as nama_sekolah')
                    ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
                    ->findAll();
    }
}
