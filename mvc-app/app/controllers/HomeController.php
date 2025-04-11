<?php 

class HomeController {
  public function index(){

    $data = [
      'title' => 'Home Page',
      'message' => 'Welcome to the Home Page',
    ];

    render('home/index', $data, 'layouts/hero_layout');

  }

 

  public function about(){

    $data = [
      'title' => 'About Page',
      'message' => 'Welcome to the About Page',
    ];

    render('home/about', $data);
    // require_once __DIR__ . '/../views/home/index.php';
  }

  public function contact(){

    $data = [
      'title' => 'Contact Page',
      'message' => 'Welcome to the Contact Page',
    ];

    render('home/contact', $data);
    // require_once __DIR__ . '/../views/home/index.php';
  }
  



}