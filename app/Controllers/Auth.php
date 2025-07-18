<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogLoginModel;


class Auth extends BaseController
{
    public function splash()
    {
        return view('auth/splash');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ambil data user dari DB
        $user = $model->where('username', $username)->first();

        // Cek kecocokan
        if ($user && password_verify($password, $user['password'])) {
        // Simpan ke session
        $session->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'role'      => $user['role'],
            'sekolah_id' => $user['sekolah_id'],
            'logged_in' => true
        ]);

        // ✅ Catat log login
        $logModel = new LogLoginModel();
        $request = \Config\Services::request();

        $logModel->insert([
            'user_id'     => $user['id'],
            'waktu_login' => date('Y-m-d H:i:s'),
            'ip_address'  => $request->getIPAddress(),
            'user_agent'  => $request->getUserAgent()->getAgentString()
        ]);

        // Arahkan ke dashboard sesuai role
        if ($user['role'] === 'sekolah') {
            return redirect()->to('/admin-sekolah/dashboard');
        } elseif ($user['role'] === 'dlh') {
            return redirect()->to('/admin-dlh/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Role tidak dikenali!');
        }
    }

        }

        public function logout()
        {
            session()->destroy();
            return redirect()->to('/login');
        }
}
