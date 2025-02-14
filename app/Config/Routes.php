<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/api/banners', 'BannerController::index');
$routes->get('/api/banners/(:num)', 'BannerController::show/$1');

$routes->get('/admin/banners', 'Admin\BannerController::index');
$routes->get('/admin/banners/create', 'Admin\BannerController::create');
$routes->post('/admin/banners/store', 'Admin\BannerController::store');
$routes->get('/admin/banners/edit/(:num)', 'Admin\BannerController::edit/$1');
$routes->post('/admin/banners/update/(:num)', 'Admin\BannerController::update/$1');
$routes->get('/admin/banners/delete/(:num)', 'Admin\BannerController::delete/$1');

