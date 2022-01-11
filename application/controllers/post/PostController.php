<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\post;

use mvc\app\Application;
use mvc\app\core\Request;
use mvc\app\models\PostModel;

class PostController
{

 public function createPost(Request $request)
 {

     $postValidate = new PostValidate($request->postBody());

     if ($request->getMethod() === 'post' &&  empty($postValidate->validate()['error'])) {
         $postModel = new PostModel();
         $postModel->createPost($postValidate);
         echo $request->redirect('/');
     }else{
         echo Application::$app->view('createPost', $postValidate->validate());
     }
 }


 public function posts(Request $request)
 {
    $postModel = new PostModel();
    $id = $_GET['postid'];
    
    if ($postModel->postById($id) != NULL) {
        echo Application::$app->view('posts', $postModel->postById($id));
    }else {
        $request->redirect('/');
    }
 }

}
 ?>