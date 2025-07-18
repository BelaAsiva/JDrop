<?php

namespace App\Models;
use CodeIgniter\Model;

class PengambilanModel extends Model
{
    protected $table = 'pengambilan_jelantah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sekolah_id', 'bulan', 'status_sekolah', 'status_dlh', 'keterangan'];

    public function getBySekolah($sekolahId)
    {
        return $this->where('sekolah_id', $sekolahId)
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    public function getAllWithSekolah()
    {
        return $this->select('pengambilan_jelantah.*, sekolah.nama as nama_sekolah')
                    ->join('sekolah', 'sekolah.id = pengambilan_jelantah.sekolah_id')
                    ->orderBy('pengambilan_jelantah.id', 'DESC')
                    ->findAll();
    }

}
