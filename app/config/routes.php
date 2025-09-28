<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------
 * Routes file
 * ------------------------------------------------------------------
 *
 * Here you can define all of your application routes.
 *
 * @see https://www.prevail-mvc.com/documentation/routing
 *
 */

// Root URL: Dito mapupunta ang base URL, halimbawa: https://espares-jeany.onrender.com/
$router->match('get|post', 'users/create', 'UsersController::create');
$router->post('users/store', 'UsersController::store');
$router->match('get|post', 'users/edit/{id}', 'UsersController::edit/$1');
$router->post('users/update/{id}', 'UsersController::update/$1');
$router->get('users/delete/{id}', 'UsersController::delete/$1');