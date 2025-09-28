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

// User list: Ito ang main page ng inyong listahan ng users
$router->get('users', 'UsersController::index');

// CRUD routes
// ------------------------------------------------------------------

// CREATE:
// Gumagana para sa GET (pag-display ng form) at POST (pag-submit ng form)
$router->match('get|post', 'users/create', 'UsersController::create');

// UPDATE:
// Gumagana para sa GET (pag-display ng form na may data) at POST (pag-submit ng changes)
// Ang {id} sa URL ay ipapasa bilang $1 sa update method.
$router->match('get|post', 'users/update/{id}', 'UsersController::update/$1');

// DELETE:
// Gumagana para sa GET method (karaniwan, ngunit ginagamit ang confirm box sa view)
// Ang {id} sa URL ay ipapasa bilang $1 sa delete method.
$router->get('users/delete/{id}', 'UsersController::delete/$1');