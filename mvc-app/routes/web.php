<?php 

$routes = [
  'GET' => [
      '/' => 'HomeController@index',
      '/about' => 'HomeController@about',
      '/user/register' => 'UserController@register',
  ],

  'POST' => [
    '/register' => 'UserController@registerUser',
  ]

];

