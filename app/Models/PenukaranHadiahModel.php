<?php

namespace App\Models;
use CodeIgniter\Model;

class PenukaranHadiahModel extends Model
{
    protected $table = 'penukaran_hadiah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'hadiah_id', 'jumlah', 'status'];

    public function getAllWithRelasi($sekolahId)
    {
        return $this->select('penukaran_hadiah.*, siswa.nama as nama_siswa, hadiah.nama as nama_hadiah')
                    ->join('siswa', 'siswa.id = penukaran_hadiah.siswa_id')
                    ->join('hadiah', 'hadiah.id = penukaran_hadiah.hadiah_id')
                    ->where('siswa.sekolah_id', $sekolahId)
                    ->orderBy('penukaran_hadiah.id', 'DESC')
                    ->findAll();
    }
}
