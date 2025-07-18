<?php

namespace App\Controllers\AdminDLH;

use App\Controllers\BaseController;
use App\Models\LogAktivitasModel;
use App\Models\LogLoginModel;
use App\Models\UserModel;

class Log extends BaseController
{
    protected $aktivitasModel;
    protected $loginModel;
    protected $userModel;

    public function __construct()
    {
        $this->aktivitasModel = new LogAktivitasModel();
        $this->loginModel     = new LogLoginModel();
        $this->userModel      = new UserModel();
    }

    public function index()
    {
        $data['logAktivitas'] = $this->aktivitasModel->getWithUser();
        $data['logLogin']     = $this->loginModel->getWithUser();
        return view('adminDLH/log/index', $data);
    }
}
