<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/contratante', 'Contratante::index');
$routes->get('/contratante/index', 'Contratante::index');
$routes->get('/contratante/new', 'Contratante::new');
$routes->get('/contratante/edit/(:any)', 'Contratante::edit/$1');
$routes->post('/contratante/update', 'Contratante::update');
$routes->post('/contratante/search', 'Contratante::search');
$routes->get('/ficha/gerar/(:num)', 'Ficha::gerar/$1');

