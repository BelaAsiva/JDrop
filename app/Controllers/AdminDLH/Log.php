<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;
use App\Models\LogLoginModel;

class Log extends BaseController
{
    protected $aktivitasModel;
    protected $loginModel;

    public function __construct()
    {
        $this->aktivitasModel = new LogAktivitasModel();
        $this->loginModel     = new LogLoginModel();
    }

    public function index()
    {
        $data['logAktivitas'] = $this->aktivitasModel->getWithUser();
        $data['logLogin']     = $this->loginModel->getWithUser();
        return view('adminDLH/log/index', $data);
    }
}
