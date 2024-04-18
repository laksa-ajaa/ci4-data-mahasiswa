<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// home
$routes->get('/', 'Home::index');
$routes->post('/authenticate', 'Home::authenticate');
$routes->get('/logout', 'Home::logout');



//Mahasiswa
$routes->group('mahasiswa', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Mahasiswa::index');
    $routes->post('/tambahdata', 'Mahasiswa::tambahdata');
    $routes->post('/updatedata', 'Mahasiswa::updatedata');
    $routes->post('/hapusdata', 'Mahasiswa::hapusdata');
});

//Prodi
$routes->group('prodi', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Prodi::index');
    $routes->post('/tambahdata', 'Prodi::tambahdata');
    $routes->post('/updatedata', 'Prodi::updatedata');
    $routes->post('/hapusdata', 'Prodi::hapusdata');
});
