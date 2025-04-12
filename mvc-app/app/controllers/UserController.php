<?php 

  class UserController{

    private $userModel;

    public function __construct() {
      $this->userModel = new User();
    }

    public function showProfile(){

      $userId = $_SESSION['user_id'];

      $user = $this->userModel->getUserById($userId);

      $data = [
        'title' => "Profile",
        'user' => $user,
        'username' => $user->username,
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'phone' => $user->phone,
        'birthday' => $user->birthday,
        'organization' => $user->organization,
        'location' => $user->location,
        'profile_image' => $user->profile_image,
      ];

      render('admin/users/profile', $data, 'layouts/admin_layout');
    }

    public function updateProfile(){
        $userId = $_SESSION['user_id'];

        $first_name = sanitize($_POST['first_name'] ?? '');
        $last_name = sanitize($_POST['last_name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $phone = sanitize($_POST['phone'] ?? '');
        $birthday = sanitize($_POST['birthday'] ?? '');
        $organization = sanitize($_POST['organization'] ?? '');
        $location = sanitize($_POST['location'] ?? '');

        $userData = [
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'phone' => $phone,
          'birthday' => $birthday,
          'organization' => $organization,
          'location' => $location
        ];

        if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK){
          $imagePath = $this->userModel->handleImageUpload($_FILES['profile_image']);

          if($imagePath){
            $userData['profile_image'] = $imagePath;
          } else {
            $_SESSION['error'] = 'FAILED to upload image';
            redirect('/admin/users/profile');
          }
        }

        $updateStatus = $this->userModel->update($userId, $userData);

        if($updateStatus){
          $_SESSION['message'] = "Profile updated successfully";
        } else {
          $_SESSION['error'] = "Failed to update profile image";
        }
      
      }

    public function showLoginForm(){

      $data = [
        'title' => "Login"
      ];

      render('user/login', $data);

    }

    public function loginUser(){
      $this->userModel->email = $_POST['email'];
      $this->userModel->password = $_POST['password'];

      if($this->userModel->login()){
        $_SESSION['user_id'] = $this->userModel->id;
        $_SESSION['username'] = $this->userModel->username;
        $_SESSION['first_name'] = $this->userModel->first_name;
        $_SESSION['last_name'] = $this->userModel->last_name;
        redirect('/dashboard');
      } else {
        echo "There was an error";
      }
    }

    public function showRegisterForm(){

      $data = [
        'title' => "Register"
      ];

      render('user/register', $data);

    }

    public function register(){


       $user = new User();
       $user->username = $_POST['username'];
       $user->email = $_POST['email'];
       $user->password = $_POST['password'];

       if($user->store()){
         redirect('/dashboard');
       } else {
         echo "There was an error";
       }
    }

    public function logout(){
      $_SESSION = [];
      session_destroy();
      redirect('/user/login');
    }


  }