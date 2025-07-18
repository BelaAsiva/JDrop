<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function sekolah()
    {
        // Cek login & role
        if (!session()->get('logged_in') || session()->get('role') !== 'sekolah') {
            return redirect()->to('/login')->with('error', 'Akses ditolak!');
        }

        return view('adminSekolah/dashboard');
    }

    public function dlh()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'dlh') {
            return redirect()->to('/login')->with('error', 'Akses ditolak!');
        }

        return view('adminDLH/dashboard');
    }
}
