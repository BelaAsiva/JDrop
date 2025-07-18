<?php

namespace App\Models;

use CodeIgniter\Model;

class HadiahModel extends Model
{
    protected $table = 'hadiah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'deskripsi', 'stok', 'poin_dibutuhkan'];
}
