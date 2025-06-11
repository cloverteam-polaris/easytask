<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::dashboard');


//configuracion
$routes->get('listProyectos', 'Dashboard::listProyectos');
$routes->get('listPaises', 'Dashboard::listPaises');
$routes->post('savePais', 'Dashboard::savePais');
$routes->post('editPais', 'Dashboard::editPais');
$routes->post('getEditPais', 'Dashboard::getEditPais');
$routes->post('deletePais', 'Dashboard::deletePais');
$routes->get('listGrupos', 'Dashboard::listGrupos');
$routes->post('getEditGrupo', 'Dashboard::getEditGrupo');

$routes->post('saveProyecto', 'Dashboard::saveProyecto');
$routes->post('deleteProyecto', 'Dashboard::deleteProyecto');
$routes->post('getEditProyecto', 'Dashboard::getEditProyecto');
$routes->post('editProyecto', 'Dashboard::editProyecto');
$routes->post('deleteGrupo', 'Dashboard::deleteGrupo');
$routes->post('saveGrupo', 'Dashboard::saveGrupo');
$routes->post('editGrupo', 'Dashboard::editGrupo');

