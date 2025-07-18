<?php

namespace App\Controllers\AdminSekolah;

use App\Controllers\BaseController;

class Notifikasi extends BaseController
{
    public function index()
    {
        return view('adminSekolah/notifikasi');
    }
}
