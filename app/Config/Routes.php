<?php

use App\Controllers\File_manager;
use App\Controllers\Api;
use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(true);
$routes->post('api/upload_files', [File_manager::class, 'upload_files']);
$routes->get('api/payment-status', [Api::class, 'paymentStatus']);
