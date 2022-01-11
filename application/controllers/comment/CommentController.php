<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\comment;

use mvc\app\Application;
use mvc\app\core\Request;
use mvc\app\models\CommentModel;

class CommentController
{

 public function createComment(Request $request)
 {
     
     $commentValidate = new CommentValidate($request->postBody());
     

     if ($request->getMethod() === 'post' && empty($commentValidate->validate()['error'])) {
    
         $commentModel = new CommentModel();
         $commentModel->createComment($commentValidate);
         $request->redirect("/posts?postid=".$commentValidate->postId);
     }else {
         $request->redirect('/posts');
     }
 }

}
 ?>