<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes = Services::routes();

// Tambahkan rute-rute kamu di bawah sini, misal:
$routes->get('/', 'Auth::splash');
$routes->get('/login', 'Auth::index');


// $routes->get('/siswa', 'Siswa::index');
// $routes->get('/siswa/create', 'Siswa::create');
// $routes->post('/siswa/store', 'Siswa::store');
// $routes->get('/siswa/delete/(:num)', 'Siswa::delete/$1');
// $routes->get('/siswa/edit/(:num)', 'Siswa::edit/$1');
// $routes->post('/siswa/update/(:num)', 'Siswa::update/$1');


// $routes->get('/sekolah', 'Sekolah::index');
// $routes->get('/sekolah/create', 'Sekolah::create');
// $routes->post('/sekolah/store', 'Sekolah::store');
// $routes->get('/sekolah/edit/(:num)', 'Sekolah::edit/$1');
// $routes->post('/sekolah/update/(:num)', 'Sekolah::update/$1');
// $routes->post('/sekolah/delete/(:num)', 'Sekolah::delete/$1');

// $routes->group('setoran', function($routes) {
//     $routes->get('/', 'Setoran::index');
//     $routes->get('create', 'Setoran::create');
//     $routes->post('store', 'Setoran::store');
//     $routes->get('edit/(:num)', 'Setoran::edit/$1');
//     $routes->post('update/(:num)', 'Setoran::update/$1');
//     $routes->get('delete/(:num)', 'Setoran::delete/$1');
// });


$routes->get('/', 'Auth::splash');
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->match(['get', 'post'], '/admin-dlh/tambah-user', 'AdminDLH::tambahUser');

// Admin Sekolah
$routes->group('admin-sekolah', ['namespace' => 'App\Controllers\AdminSekolah'], function($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('notifikasi', 'Notifikasi::index');

    // Siswa
    $routes->get('siswa', 'Siswa::index');
    $routes->get('siswa/create', 'Siswa::create');
    $routes->post('siswa/store', 'Siswa::store');
    $routes->get('siswa/edit/(:num)', 'Siswa::edit/$1');
    $routes->post('siswa/update/(:num)', 'Siswa::update/$1');
    $routes->get('siswa/delete/(:num)', 'Siswa::delete/$1');

    // Setoran
    $routes->get('setoran', 'Setoran::index');
    $routes->get('setoran/create', 'Setoran::create');
    $routes->post('setoran/store', 'Setoran::store');
    $routes->get('setoran/edit/(:num)', 'Setoran::edit/$1');
    $routes->post('setoran/update/(:num)', 'Setoran::update/$1');
    $routes->get('setoran/delete/(:num)', 'Setoran::delete/$1');

    // Hadiah
    $routes->get('hadiah', 'Hadiah::index');
    $routes->get('hadiah/create', 'Hadiah::create');
    $routes->post('hadiah/store', 'Hadiah::store');
    $routes->get('hadiah/edit/(:num)', 'Hadiah::edit/$1');
    $routes->post('hadiah/update/(:num)', 'Hadiah::update/$1');
    $routes->get('hadiah/delete/(:num)', 'Hadiah::delete/$1');

    // Penukaran Hadiah
    $routes->get('penukaran', 'Penukaran::index');
    $routes->get('penukaran/create', 'Penukaran::create');
    $routes->post('penukaran/store', 'Penukaran::store');

    // Pengambilan
    $routes->get('pengambilan', 'Pengambilan::index');
    $routes->get('pengambilan/create', 'Pengambilan::create');
    $routes->post('pengambilan/store', 'Pengambilan::store');
    $routes->get('pengambilan/edit/(:num)', 'Pengambilan::edit/$1');
    $routes->get('pengambilan/delete/(:num)', 'Pengambilan::delete/$1');
    $routes->post('pengambilan/update/(:num)', 'Pengambilan::update/$1');

});

$routes->group('admin-dlh', ['namespace' => 'App\Controllers\AdminDLH'], function($routes) {
    $routes->get('sekolah', 'Sekolah::index');
    $routes->get('sekolah/create', 'Sekolah::create');
    $routes->post('sekolah/store', 'Sekolah::store');
    $routes->get('sekolah/edit/(:num)', 'Sekolah::edit/$1');
    $routes->post('sekolah/update/(:num)', 'Sekolah::update/$1');
    $routes->post('sekolah/delete/(:num)', 'Sekolah::delete/$1');

    $routes->get('pengambilan', 'Pengambilan::index');
    $routes->get('pengambilan/validasi/(:num)', 'Pengambilan::validasi/$1');
    $routes->get('pengambilan/batalkan/(:num)', 'Pengambilan::batalkan/$1');

    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('log', 'Log::index');
    $routes->get('log-login', 'Log::login');
    $routes->get('notifikasi', 'Notifikasi::index');
    $routes->get('rekapitulasi', 'Rekapitulasi::index');
    $routes->get('rekapitulasi/export/excel', 'Rekapitulasi::exportExcel'); 
    $routes->get('rekapitulasi/export/pdf', 'Rekapitulasi::exportPDF');
    $routes->get('validasi-sekolah', 'ValidasiSekolah::index');
    $routes->get('validasi-sekolah', 'ValidasiSekolah::index');
    $routes->post('validasi-sekolah/aktifkan/(:num)', 'ValidasiSekolah::aktifkan/$1');
    $routes->post('validasi-sekolah/nonaktifkan/(:num)', 'ValidasiSekolah::nonaktifkan/$1');
});


