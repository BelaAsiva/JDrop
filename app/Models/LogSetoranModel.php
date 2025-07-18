<?php

namespace App\Models;

use CodeIgniter\Model;

class LogSetoranModel extends Model
{
    protected $table = 'log_setoran'; // Pastikan ini sesuai nama tabel
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'aksi', 'waktu']; // Sesuaikan dengan kolom tabel log_setoran
    public $timestamps = false; // Nonaktifkan jika tidak ada kolom created_at/updated_at
}
