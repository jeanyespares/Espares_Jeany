<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
| Define all web routes for your app.
|
*/

// Default route → Show user directory (with pagination support)
$router->get('/', 'UsersController::index');

// User CRUD routes
$router->match('get|post', 'users/create', 'UsersController::create');
$router->match('get|post', 'users/update/{id}', 'UsersController::update/$1');
$router->get('users/delete/{id}', 'UsersController::delete/$1');

// Pagination routes
$router->get('users/index', 'UsersController::index');
$router->get('users/index/{page}', 'UsersController::index/$1');
