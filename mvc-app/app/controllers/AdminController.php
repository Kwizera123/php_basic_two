<?php

  class AdminController {

    public function __construct() {
      
    }

    public function dashboard(){
      $data = [
        'title' => 'Dashboard',
        'message' => 'Welcome to the Dashboard',

      ];

      render('admin/dashboard', $data, 'layouts/admin_layout');
    }


    }

  

  

