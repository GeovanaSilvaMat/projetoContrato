<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Página inicial: lista todos os contratantes com dados vinculados (join com representante e faturamento)
$routes->get('contratante', 'Contratante::index');

// Página para cadastrar novo contratante
$routes->get('contratante/novo', 'Contratante::new');

// Página para editar contratante específico
$routes->get('contratante/editar/(:num)', 'Contratante::edit/$1');

// Submissão de formulário para atualizar contratante
$routes->post('contratante/update', 'Contratante::update');

// Busca de contratante por CNPJ (usado na tela de busca)
$routes->match(['get', 'post'], 'contratante/buscar', 'Contratante::search');