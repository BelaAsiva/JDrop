<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'judul', 'pesan', 'dibaca', 'waktu_kirim'];

    // Ambil semua notifikasi untuk user login (misalnya sekolah)
    public function getByUser($userId)
    {
        return $this->where('user_id', $userId)
                    ->orderBy('waktu_kirim', 'DESC')
                    ->findAll();
    }

    public function tandaiDibaca($userId)
    {
        return $this->where('user_id', $userId)
                    ->set('dibaca', 1)
                    ->update();
    }
}
