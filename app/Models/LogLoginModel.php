<?php

namespace App\Models;

use CodeIgniter\Model;

class LogLoginModel extends Model
{
    protected $table = 'log_login';
    protected $allowedFields = ['user_id', 'waktu_login', 'ip_address', 'user_agent'];

    public function getWithUser()
    {
        return $this->select('log_login.*, users.nama_lengkap')
                    ->join('users', 'users.id = log_login.user_id')
                    ->orderBy('waktu_login', 'DESC')
                    ->findAll();
    }
}
