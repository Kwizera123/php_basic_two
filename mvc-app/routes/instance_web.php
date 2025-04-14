<?php 

$router = new Route();



$router->get('/', 'HomeController@index');
$router->get('/about' , 'HomeController@about');
$router->get( '/contact' , 'HomeController@contact');
$router->get('/user/register' , 'UserController@showRegisterForm');
$router->get('/user/login' , 'UserController@showLoginForm');
$router->get('/dashboard' , 'AdminController@dashboard');
$router->get('/admin' , 'AdminController@admin');
$router->get( '/admin/users/profile' , 'UserController@showProfile');
$router->get( '/user/test/{id}', 'UserController@test');


$router->post( '/register' , 'UserController@register');
$router->post( '/login' , 'UserController@loginUser');
$router->post( '/logout' , 'UserController@logout');
$router->post( '/admin/user/update' , 'UserController@updateProfile');
$router->post( '/admin/profile/user/password/update' , 'UserController@updateUserProfilePassword');




