<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\auth\register;

use mvc\app\Application;
use mvc\app\core\Request;
use mvc\app\models\UserModel;

class UserController
{

  public function createUser(Request $request)
  {

    $validate = new UserValidate($request->postBody());
   
    if ($request->getMethod() === 'post' && empty($validate->validate()['error']) ) {
          
              $userModel = new UserModel();
              $userModel->createUser($validate);
              $request->redirect('/login');
          }else {
              echo Application::$app->view('auth/register', $validate->validate());
          }       
  }  
 
  public function findAll()
  {
    $userModel = new UserModel();
    echo '<pre>';
    var_dump($userModel->findAllUsers());
    echo '<pre>';
  }    
 
  public function findById($id)
  {
    $id = $_GET['id'];
    $userModel = new UserModel();
    $result = $userModel->findUserById($id);
    echo Application::$app->view('index', $result);
    
  }    
  
  
 

}
 ?>