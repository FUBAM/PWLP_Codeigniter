<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\KaryawanController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('karyawan', ['controller' => KaryawanController::class]);
// $routes->get('karyawan', 'KaryawanController::index');

$routes->get('absensi', 'AbsensiController::index');

$routes->post('absensi/hadir', 'AbsensiController::tandaiHadir');