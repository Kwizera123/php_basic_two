<?php

  class AdminController {

    public function __construct() {
      AuthMiddleware::requiredLogin();
    }

    public function dashboard(){

      

      $data = [
        'title' => 'Dashboard',
        'message' => 'Welcome to the Dashboard',

      ];

      render('admin/dashboard', $data, 'layouts/admin_layout');
    }


    }

  

  

