<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] = 'posts/index';
$route['posts/criar'] = 'posts/criar';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/visualizar/$1';
$route['posts'] = 'posts/index';


$route['login'] = 'usuarios/login';

$route['default_controller'] = 'posts/index';

$route['categorias'] = 'categorias/index';
$route['categorias/criar'] = 'categorias/criar';
$route['categorias/posts/(:any)'] = 'categorias/posts/$1';

$route['(:any)'] = 'pages/vizualizar/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
