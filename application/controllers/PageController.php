<?php
declare(strict_types=1);
  
namespace mvc\app\controllers;

use mvc\app\Application;
use mvc\app\models\PostModel;

class PageController
{

  function index()
  {
     $postModel = new PostModel();

     if ($postModel->allPosts()) {
       echo Application::$app->view('index', $postModel->allPosts());
     }else{
       echo Application::$app->view('index');
     }
     
  }

  function login()
  {
     echo Application::$app->view('auth/login');
  }

  function register()
  {
     echo Application::$app->view('auth/register');
  }

  function post()
  {
     echo Application::$app->view('createPost');
  }

 



}
 ?>