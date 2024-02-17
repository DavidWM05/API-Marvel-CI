<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/enlistar', 'Home::enlistar');

$routes->get('/enlistados', 'Personaje::enlistados');
$routes->get('/enlistados/editar', 'Personaje::editar');
$routes->get('/enlistados/eliminar', 'Personaje::eliminar');
$routes->get('/enlistados/buscar', 'Personaje::buscar');
$routes->get('/enlistados/regresar', 'Personaje::regresar');

$routes->post('/enlistados/guardar', 'Personaje::guardar');
$routes->post('/enlistados/actualizar', 'Personaje::actualizar');
