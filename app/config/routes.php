<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

$router->get('/', 'UsersController::index');

// User list
$router->get('users', 'UsersController::index');

// CRUD routes
$router->match('get|post', 'users/create', 'UsersController::create');
$router->match('get|post', 'users/update/{id}', 'UsersController::update/$1');
$router->get('users/delete/{id}', 'UsersController::delete/$1');
