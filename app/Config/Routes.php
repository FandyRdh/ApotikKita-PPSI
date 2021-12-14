<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');



// Landing Page (Fandy)
$routes->get('/', 'Landing_Page::index');
$routes->get('/About', 'Landing_Page::About');
$routes->get('/Login', 'Landing_Page::Login');
$routes->get('/Login/Login_Action', 'Landing_Page::Login_Action');
$routes->get('/Logout', 'Landing_Page::Logout');

// Dashboard (Fandy)
$routes->get('/Dashboard', 'Dashboard_Page::Dashboard');

// Database (Fandy)
$routes->get('/Database', 'Database_Page::Karyawan');
$routes->get('/Database/Karyawan/Save', 'Database_Page::Save_Karyawan');
$routes->get('/Database/Karyawan/Update_Karyawan', 'Database_Page::Update_Karyawan');
$routes->get('/Database/Karyawan/Detail/(:segment)', 'Database_Page::Detail_Karyawan/$1');
$routes->get('/Database/Karyawan/Hapus/(:segment)', 'Database_Page::Hapus_Karyawan/$1');

$routes->get('/Database/Obat', 'Database_Page::Obat');
$routes->get('/Database/Obat/Save', 'Database_Page::Save_Obat');
$routes->get('/Database/Obat/Detail/(:segment)', 'Database_Page::Detail_Stok_Obat/$1');
$routes->get('/Database/Obat/Update_Obat', 'Database_Page::Update_Obat');
$routes->get('/Database/Obat/Hapus/(:segment)', 'Database_Page::Hapus_Obat/$1');

$routes->get('/Database/Transaksi', 'Database_Page::Transaksi');
$routes->get('/Database/Transaksi/Detail/(:segment)', 'Database_Page::Detail_Transaksi/$1');


// Master (Fandy)
$routes->get('/Master/Jabatan', 'Master_Page::Jabatan');
$routes->get('/Master/Jabatan/Save', 'Master_Page::Save');
$routes->get('/Master/Jabatan/Hapus/(:segment)', 'Master_Page::Hapus_Jabatan/$1');

$routes->get('/Master/Kategori', 'Master_Page::Kategori');
$routes->get('/Master/Kategori/Save', 'Master_Page::Save_Kategori');
$routes->get('/Master/Kategori/Hapus/(:segment)', 'Master_Page::Hapus_Kategori/$1');

$routes->get('/Master/Jenis', 'Master_Page::Jenis');
$routes->get('/Master/Jenis/Save', 'Master_Page::Save_Jenis');
$routes->get('/Master/Jenis/Hapus/(:segment)', 'Master_Page::Hapus_Jenis/$1');

// Laporan Master(Fandy)
$routes->get('/Laporan', 'Laporan_Page::Laporan');
$routes->get('/Laporan/Laporan_Karyawan', 'Laporan_Page::Laporan_Karyawan');
$routes->get('/Laporan/Laporan_Obat', 'Laporan_Page::Laporan_Obat');
$routes->get('/Laporan/Laporan_Penjualan', 'Laporan_Page::Laporan_Penjualan');

// Kasir (Della)
$routes->get('/Pembelian', 'Kasir_Page::Pembelian');
$routes->get('/Pembelian/Hitung', 'Kasir_Page::Hitung');
$routes->get('/Pembelian/Hitung/Save', 'Kasir_Page::Save_Pembelian');
$routes->get('/Stok_Obat', 'Kasir_Page::Stok_Obat');
$routes->get('/Stok_Obat/Cari', 'Kasir_Page::Search_Stok_Obat');
$routes->get('/Stok_Obat/Detail/(:segment)', 'Kasir_Page::Detail_Stok_Obat/$1');
$routes->get('/Laporan_Kasir', 'Kasir_Page::Laporan');
$routes->get('/Laporan_Kasir/Laporan_Penjualan', 'Kasir_Page::Laporan_Penjualan');

// Gudang (Hasan)
$routes->get('/Gudang', 'Gudang_Page::Data_Obat');
$routes->get('/Gudang/Cari', 'Gudang_Page::Search_Stok_Obat');
$routes->get('/Gudang/Obat/Save', 'Gudang_Page::Save_Obat');
$routes->get('/Gudang/Detail/(:segment)', 'Gudang_Page::Detail_Stok_Obat/$1');
$routes->get('/Gudang/Obat/Update_Obat', 'Gudang_Page::Update_Obat');
$routes->get('/Gudang/Obat/Hapus/(:segment)', 'Gudang_Page::Hapus_Obat/$1');
$routes->get('/Laporan_Gudang', 'Gudang_Page::Laporan');
$routes->get('/Laporan_Gudang/Laporan_Obat', 'Gudang_Page::Laporan_Obat');
$routes->get('/Laporan_Gudang/Petunjuk_Obat/(:segment)', 'Gudang_Page::Petunjuk_Obat/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
