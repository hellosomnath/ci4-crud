<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/student/list', 'StudentController::index');
$routes->get('/student/register', "StudentController::register");
$routes->post('/student/register', "StudentController::doRegiter");
$routes->get('/student/edit/(:any)', "StudentController::edit/$1");
$routes->put('/student/update/(:any)', "StudentController::update/$1");
$routes->get('/student/delete/(:any)', "StudentController::delete/$1");
