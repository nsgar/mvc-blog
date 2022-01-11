<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\auth\login;

use mvc\app\Application;
use mvc\app\core\Request;
use mvc\app\models\LoginModel;

class LoginController
{

   public function login(Request $request)
   {
      
      if ($request->getMethod() === 'post') {
         $login = new LoginModel();
         $login->checkUser($request->postBody());
      }else{
         echo Application::$app->view('auth/login');
      }
   }

   public function logout()
   {
       Application::$app->session->destroy();
       Application::$app->request->redirect('/');
   }

}
 ?>