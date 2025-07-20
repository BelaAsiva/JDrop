<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAktivitasModel extends Model
{
    protected $table = 'log_aktivitas';
    protected $allowedFields = ['user_id', 'aktivitas', 'waktu'];

    public function getWithUser()
    {
        return $this->select('log_aktivitas.*, users.username as nama_pengguna, log_aktivitas.aktivitas as aksi')
                    ->join('users', 'users.id = log_aktivitas.user_id')
                    ->orderBy('waktu', 'DESC')
                    ->findAll();
    }
}
