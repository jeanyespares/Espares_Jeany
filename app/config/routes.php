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
$router->get('/', 'UsersController::index');
$router->match('/users/create', 'UsersController::create', ['GET', 'POST']);
$router->match('/users/update/{id}', 'UsersController::update', ['GET', 'POST']);
$router->get('/users/delete/{id}', 'UsersController::delete');