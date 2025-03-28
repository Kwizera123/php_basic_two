<?php 

$routes = [
  'GET' => [
      '/' => 'HomeController@index',
      '/about' => 'HomeController@about',
      '/user/register' => 'UserController@showRegisterForm',
  ],

  'POST' => [
    '/register' => 'UserController@register',
  ]

];

