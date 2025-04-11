<?php 

$routes = [
  'GET' => [
      '/' => 'HomeController@index',
      '/about' => 'HomeController@about',
      '/contact' => 'HomeController@contact',
      '/user/register' => 'UserController@showRegisterForm',
      '/user/login' => 'UserController@showLoginForm',
      '/dashboard' => 'AdminController@dashboard',
      '/admin' => 'AdminController@admin',
  ],

  'POST' => [
    '/register' => 'UserController@register',
    '/login' => 'UserController@loginUser',
    '/logout' => 'UserController@logout',
  ]

];

