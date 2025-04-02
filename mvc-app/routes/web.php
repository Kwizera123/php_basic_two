<?php 

$routes = [
  'GET' => [
      '/' => 'HomeController@index',
      '/about' => 'HomeController@about',
      '/user/register' => 'UserController@showRegisterForm',
      '/user/login' => 'UserController@showLoginForm',
  ],

  'POST' => [
    '/register' => 'UserController@register',
  ]

];

