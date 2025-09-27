<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$router->get('/', 'UsersController::index');

// CRUD
$router->match('get|post', 'users/create', 'UsersController::create');
$router->match('get|post', 'users/update/{id}', 'UsersController::update/$1');
$router->get('users/delete/{id}', 'UsersController::delete/$1');

// Pagination segment
$router->get('users/index', 'UsersController::index');
$router->get('users/index/(:num)', 'UsersController::index/$1');
