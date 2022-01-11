<?php
declare(strict_types=1);
  
namespace mvc\app\models;

use mvc\app\Application;

class LoginModel
{

  private $email;
  private $password;

  
  public function checkUser($data)
  {
    foreach ($data as $key => $value) {
          if (property_exists($this, $key)) {
             $this->{$key} = $value;
          }
    }
    
    $stmt = Application::$app->db()->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$this->email]);
    $user = $stmt->fetch();
    if ($user && password_verify($this->password, $user['password'])) {
      Application::$app->session->setSession('token', $user['email'], $user['id']);
      Application::$app->request->redirect('/');
       
    }else{
       $error['errorMesage'] = "The email address or password is incorrect. Please try again.";
       echo Application::$app->view('auth/login',$error);
      } 
  
  }


}


 ?>