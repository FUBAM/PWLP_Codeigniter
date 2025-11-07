<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('karyawan', ['controller' => KaryawanController::class]);

$routes->get('absensi', 'AbsensiController::index');

$routes->post('absensi/hadir', 'AbsensiController::tandaiHadir');