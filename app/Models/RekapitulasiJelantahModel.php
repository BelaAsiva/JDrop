<?php

namespace App\Models;
use CodeIgniter\Model;

class RekapitulasiJelantahModel extends Model
{
    protected $table = 'rekapitulasi_jelantah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sekolah_id', 'bulan', 'tahun', 'total_ml'];

    public function getAllWithSekolah()
    {
        return $this->select('rekapitulasi_jelantah.*, sekolah.nama AS nama_sekolah')
                    ->join('sekolah', 'sekolah.id = rekapitulasi_jelantah.sekolah_id')
                    ->orderBy('tahun', 'ASC')
                    ->orderBy('FIELD(bulan, "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember")')
                    ->findAll();
    }
}
