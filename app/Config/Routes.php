<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/', 'Home::index');
// $routes->get('/api/surat_masuk', 'suratMasuk::index');
$routes->resource('api/surat_masuk', ['controller' => 'SuratMasuk']);
$routes->resource('api/disposisi', ['controller' => 'Disposisi']);
$routes->resource('api/surat_keluar', ['controller' => 'SuratKeluar']);
$routes->resource('api/referensi', ['controller' => 'Referensi']);
$routes->resource('api/user', ['controller' => 'User']);
$routes->resource('api/nomor', ['controller' => 'NomorSurat']);

$routes->add('api/surat_masuk/update/(:any)', 'SuratMasuk::update');
$routes->add('api/surat_keluar/update/(:any)', 'SuratKeluar::update');

$routes->get('/api/countData/referensiCount', 'countData::referensiCount');
$routes->get('/api/countData/suratMasukCount', 'countData::suratMasukCount');
$routes->get('/api/countData/suratKeluarCount', 'countData::suratKeluarCount');
$routes->get('/api/countData/disposisiCount', 'countData::disposisiCount');
$routes->post('/api/login', 'user::checkLogin');
$routes->post('/api/getUserList/(:any)', 'user::getUserList');
// $routes->post('/api/userSession/login', 'UserSession::login');

// $routes->get('api/surat_masuk/new',             'SuratMasuk::new');
// $routes->post('api/surat_masuk',                'SuratMasuk::create');
// $routes->get('api/surat_masuk',                 'SuratMasuk::index');
// $routes->get('api/surat_masuk/(:segment)',      'SuratMasuk::show/$1');
// $routes->get('api/surat_masuk/(:segment)/edit', 'SuratMasuk::edit/$1');
// $routes->put('api/surat_masuk/(:segment)',      'SuratMasuk::update/$1');
// $routes->patch('api/surat_masuk/(:segment)',    'SuratMasuk::update/$1');
// $routes->delete('api/surat_masuk/(:segment)',   'SuratMasuk::delete/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
