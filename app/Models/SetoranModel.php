<?php

namespace App\Models;

use CodeIgniter\Model;

class SetoranModel extends Model
{
    protected $table = 'setoran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'tanggal', 'volume_ml', 'poin_didapat'];

    // Untuk Admin Sekolah: Ambil semua setoran dengan data siswa
    public function getAllWithSiswa()
    {
        return $this->select('setoran.*, siswa.nama as nama_siswa')
                    ->join('siswa', 'siswa.id = setoran.siswa_id')
                    ->orderBy('tanggal', 'DESC')
                    ->findAll();
    }

    // Untuk Admin Sekolah: Ambil 1 data setoran dengan data siswa
    public function getByIdWithSiswa($id)
    {
        return $this->select('setoran.*, siswa.nama as nama_siswa')
                    ->join('siswa', 'siswa.id = setoran.siswa_id')
                    ->where('setoran.id', $id)
                    ->first();
    }

    // Untuk Admin Sekolah: Ambil top N pengumpul jelantah dalam sekolah tertentu
    public function getTopPengumpul($sekolahId, $limit = 5)
    {
        return $this->select('siswa.nama, siswa.nisn, SUM(setoran.volume_ml) AS total_ml, SUM(setoran.poin_didapat) AS total_poin')
                    ->join('siswa', 'siswa.id = setoran.siswa_id')
                    ->where('siswa.sekolah_id', $sekolahId)
                    ->groupBy('setoran.siswa_id')
                    ->orderBy('total_ml', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    // Untuk Admin DLH: Ranking sekolah berdasarkan total volume jelantah
    public function getRankingSekolah($limit = 10)
    {
        return $this->select('sekolah.nama AS nama_sekolah, SUM(setoran.volume_ml) AS total_ml')
                    ->join('siswa', 'siswa.id = setoran.siswa_id')
                    ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
                    ->groupBy('sekolah.id')
                    ->orderBy('total_ml', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    // Untuk Admin DLH: Rekap bulanan tiap sekolah
    public function getMonthlyRekap()
    {
        return $this->select('sekolah.nama AS nama_sekolah, MONTHNAME(setoran.tanggal) AS nama_bulan, MONTH(setoran.tanggal) AS no_bulan, YEAR(setoran.tanggal) AS tahun, SUM(setoran.volume_ml) AS total_ml')
                    ->join('siswa', 'siswa.id = setoran.siswa_id')
                    ->join('sekolah', 'sekolah.id = siswa.sekolah_id')
                    ->groupBy('sekolah.id, tahun, no_bulan')
                    ->orderBy('sekolah.nama ASC, tahun ASC, no_bulan ASC')
                    ->findAll();
    }
}
