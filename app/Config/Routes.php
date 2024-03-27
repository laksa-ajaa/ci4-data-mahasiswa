<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// home
$routes->get('/', 'Home::index');
$routes->get('/fungsi', 'Home::fungsi');
$routes->get('/tampilnama', 'Home::tampilnama');
$routes->get('/kirimdataview', 'Home::kirimdataview');

// page
$routes->get('/page', 'Page::index');
$routes->get('/page/fungsi', 'Page::fungsi');
$routes->get('/page/tampilnama', 'Page::tampilnama');
$routes->get('/page/kirimdataview', 'Page::kirimdataview');
$routes->get('/page/paramany/(:any)', 'Page::tampilparameter/$1');
$routes->get('/page/umur/(:num)', 'Page::parameterUmur/$1');


// biodata
$routes->get('/biodata/tampilbiodata', 'Biodata::tampilbiodata');
$routes->get('page/mahasiswa', 'Page::mahasiswa');
$routes->get('page/matakuliah', 'Page::matakuliah');
$routes->get('page/dosen', 'Page::dosen');


//Mahasiswa
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->post('/mahasiswa/tambahdata', 'Mahasiswa::tambahdata');
$routes->post('/mahasiswa/updatedata', 'Mahasiswa::updatedata');
$routes->post('/mahasiswa/hapusdata', 'Mahasiswa::hapusdata');

//Prodi
$routes->get('/prodi', 'Prodi::index');
$routes->post('/prodi/tambahdata', 'Prodi::tambahdata');
$routes->post('/prodi/updatedata', 'Prodi::updatedata');
$routes->post('/prodi/hapusdata', 'Prodi::hapusdata');
