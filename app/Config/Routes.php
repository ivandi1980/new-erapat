<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


/**
 * --------------------------------------------------------------------
 * FRONTEND Route Configuration
 * --------------------------------------------------------------------
 */

$routes->get('/', 'Main::calendar');
$routes->get('/documentation', 'Documentation::index');


/**
 * --------------------------------------------------------------------
 * ZOHO Route Configuration
 * --------------------------------------------------------------------
 */

$routes->get('/zohoconnect', 'ZohoConnect::index');
$routes->get('/zohoforms', 'ZohoConnect::zohoforms');
$routes->get('/zohoreports', 'ZohoConnect::zohoreports');


/**
 * --------------------------------------------------------------------
 * E-RAPAT Route Configuration
 * --------------------------------------------------------------------
 */

$routes->get('/erapatconnect', 'ErapatFormConnect::index');


/**
 * --------------------------------------------------------------------
 * AUTHENTIFICATION Route Configuration
 * --------------------------------------------------------------------
 */

$routes->get('register', 'Register::index');
$routes->get('login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
$routes->match(['get', 'post'], '/cek', 'Login::cek', ['filter' => 'ceklogin']);
$routes->get('/logout', 'Login::logout', ['filter' => 'ceklogin']);


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * ADMIN SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/admin', 'Admin::index', ['filter' => 'ceklogin']);
$routes->get('/editadmin/(:any)', 'Admin::editAdmin/$1', ['filter' => 'ceklogin']);
$routes->post('/updateadmin/(:any)', 'Admin::updateadmin/$1', ['filter' => 'ceklogin']);
$routes->get('/changeadminpassword/(:any)', 'Admin::changepassword/$1', ['filter' => 'ceklogin']);


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration 
 * USER SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/user', 'User::index', ['filter' => 'ceklogin']);
$routes->get('/edituser/(:any)', 'User::edituser/$1', ['filter' => 'ceklogin']);
$routes->post('/updateuser/(:any)', 'User::updateuser/$1', ['filter' => 'ceklogin']);
$routes->post('/updateuserpassword', 'User::updateuserpassword', ['filter' => 'ceklogin']);
$routes->get('/changeuserpassword/(:any)', 'User::changeuserpassword/$1', ['filter' => 'ceklogin']);


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * ACCOUNT SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/account', 'Account::index', ['filter' => 'ceklogin']);
$routes->get('/addaccount', 'Account::addaccount', ['filter' => 'ceklogin']);
$routes->post('/storeaccount', 'Account::storeaccount', ['filter' => 'ceklogin']);
$routes->get('/detailaccount/(:any)', 'Account::detailAccount/$1', ['filter' => 'ceklogin']);
$routes->get('/editaccount/(:any)', 'Account::editAccount/$1', ['filter' => 'ceklogin']);
$routes->post('/updateaccount', 'Account::updateaccount', ['filter' => 'ceklogin']);
$routes->get('/restricted', 'Account::restricted_account', ['filter' => 'ceklogin']);
$routes->get('/aktifkan/(:any)', 'Account::aktifkan/$1', ['filter' => 'ceklogin']);
$routes->get('/blokir/(:any)', 'Account::blokir/$1', ['filter' => 'ceklogin']);
$routes->get('/accountaccess/(:any)', 'Account::accountaccess/$1', ['filter' => 'ceklogin']);
$routes->get('/resetaccountpassword/(:any)', 'Account::resetaccountpassword/$1', ['filter' => 'ceklogin']);
$routes->get('/leveluser/(:any)/(:any)', 'Account::leveluser/$1/$2', ['filter' => 'ceklogin']);
$routes->get('/changeuserspassword/(:any)', 'Account::changeuserspassword/$1', ['filter' => 'ceklogin']);



/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * SEKRETARIAT SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/sekretariat', 'Sekretariat::index', ['filter' => 'ceklogin']);
$routes->get('/addsekretariat', 'Sekretariat::addsekretariat', ['filter' => 'ceklogin']);
$routes->post('/storesekretariat', 'Sekretariat::storesekretariat', ['filter' => 'ceklogin']);
$routes->get('/editsekretariat/(:any)', 'Sekretariat::editsekretariat/$1', ['filter' => 'ceklogin']);
$routes->post('/updatesekretariat', 'Sekretariat::updatesekretariat', ['filter' => 'ceklogin']);
$routes->get('/deletesekretariat/(:any)', 'Sekretariat::deletesekretariat/$1', ['filter' => 'ceklogin']);


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * BAGIAN SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/bagian', 'Bagian::index', ['filter' => 'ceklogin']);
$routes->get('/addbagian', 'Bagian::addbagian', ['filter' => 'ceklogin']);
$routes->post('/storebagian', 'Bagian::storebagian', ['filter' => 'ceklogin']);
$routes->get('/editbagian/(:any)', 'Bagian::editbagian/$1', ['filter' => 'ceklogin']);
$routes->post('/updatebagian', 'Bagian::updatebagian', ['filter' => 'ceklogin']);
$routes->get('/deletebagian/(:any)', 'Bagian::deletebagian/$1', ['filter' => 'ceklogin']);



/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * BAGIAN SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/zoom', 'Zoom::index', ['filter' => 'ceklogin']);
$routes->get('/offline/(:any)', 'Zoom::Offline/$1', ['filter' => 'ceklogin']);
$routes->get('/online/(:any)', 'Zoom::Online/$1', ['filter' => 'ceklogin']);



/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * RAPAT SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/rapat', 'Rapat::index', ['filter' => 'ceklogin']);
$routes->get('/baru', 'Rapat::baru', ['filter' => 'ceklogin']);
$routes->post('/addrapat', 'Rapat::store', ['filter' => 'ceklogin']);
$routes->post('/updaterapat', 'Rapat::save', ['filter' => 'ceklogin']);
$routes->post('/undanganaction', 'Rapat::undanganaction', ['filter' => 'ceklogin']);
$routes->post('/notulenaction', 'Rapat::notulenaction', ['filter' => 'ceklogin']);
$routes->post('/absensiaction', 'Rapat::absensiaction', ['filter' => 'ceklogin']);
$routes->post('/tambahanaction1', 'Rapat::tambahanaction1', ['filter' => 'ceklogin']);
$routes->post('/tambahanaction2', 'Rapat::tambahanaction2', ['filter' => 'ceklogin']);
$routes->post('/tambahanaction3', 'Rapat::tambahanaction3', ['filter' => 'ceklogin']);
$routes->post('/updatestatus/(:any)', 'Rapat::updatestatus/$1', ['filter' => 'ceklogin']);
$routes->get('/editrapat/(:any)', 'Rapat::edit/$1', ['filter' => 'ceklogin']);
$routes->get('/detail/(:any)', 'Rapat::detail/$1', ['filter' => 'ceklogin']);
$routes->get('/cetakperdate', 'Rapat::cetakperdate', ['filter' => 'ceklogin']);
$routes->get('/cetakdetail/(:any)', 'Rapat::cetakdetail/$1', ['filter' => 'ceklogin']);
$routes->get('/reschedulle/(:any)', 'Rapat::reschedulle/$1', ['filter' => 'ceklogin']);
$routes->get('/uploadundangan/(:any)', 'Rapat::uploadundangan/$1', ['filter' => 'ceklogin']);
$routes->get('/uploadnotulen/(:any)', 'Rapat::uploadnotulen/$1', ['filter' => 'ceklogin']);
$routes->get('/uploadabsensi/(:any)', 'Rapat::uploadabsensi/$1', ['filter' => 'ceklogin']);
$routes->get('/uploadtambahan1/(:any)', 'Rapat::uploadtambahan1/$1', ['filter' => 'ceklogin']);
$routes->get('/uploadtambahan2/(:any)', 'Rapat::uploadtambahan2/$1', ['filter' => 'ceklogin']);
$routes->get('/uploadtambahan3/(:any)', 'Rapat::uploadtambahan3/$1', ['filter' => 'ceklogin']);
$routes->get('/downloadundangan/(:any)', 'Rapat::downloadundangan/$1', ['filter' => 'ceklogin']);
$routes->get('/downloadnotulen/(:any)', 'Rapat::downloadnotulen/$1', ['filter' => 'ceklogin']);
$routes->get('/downloadabsensi/(:any)', 'Rapat::downloadabsensi/$1', ['filter' => 'ceklogin']);
$routes->get('/downloadtambahan1/(:any)', 'Rapat::downloadtambahan1/$1', ['filter' => 'ceklogin']);
$routes->get('/downloadtambahan2/(:any)', 'Rapat::downloadtambahan2/$1', ['filter' => 'ceklogin']);
$routes->get('/downloadtambahan3/(:any)', 'Rapat::downloadtambahan3/$1', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/rapat/getmm', 'Rapat::get_media_meeting');
$routes->match(['get', 'post'], '/rapat/getmmm', 'Rapat::get_zoomid');
$routes->get('/rapatcancel', 'Rapat::rapatcancel', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/cetaks', 'Rapat::get_cetaks', ['filter' => 'ceklogin']);


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * PEMBAHARUAN SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/pembaharuan', 'Pembaharuan::index', ['filter' => 'ceklogin']);
$routes->get('/cekzoom', 'Pembaharuan::cekzoom', ['filter' => 'ceklogin']);
$routes->get('/cekoffline', 'Pembaharuan::cekoffline', ['filter' => 'ceklogin']);
$routes->post('/cekrapatoffline', 'Pembaharuan::cekrapatoffline');


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * RIWAYAT SECTION
 * --------------------------------------------------------------------
 */

$routes->match(['get', 'post'], '/riwayat', 'Riwayat::index', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/riwayats', 'Riwayat::get_riwayat', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/riwayatoffline', 'Riwayat::cekhistoffline', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/getriwayatoffline', 'Riwayat::gethistoffline', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/riwayatonline', 'Riwayat::cekhistonline', ['filter' => 'ceklogin']);
$routes->match(['get', 'post'], '/getriwayatonline', 'Riwayat::gethistonline', ['filter' => 'ceklogin']);


/**
 * --------------------------------------------------------------------
 * CPANEL Route Configuration
 * CETAK SECTION
 * --------------------------------------------------------------------
 */

$routes->get('/cetak', 'Cetak::index', ['filter' => 'ceklogin']);







/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
