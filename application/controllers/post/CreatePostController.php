<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\post;

use mvc\app\Application;

class CreatePostController
{

  public function createPost()
  {
    echo Application::$app->view('createpost');
  }

  public function submitPost()
  {
    var_dump($_POST);
  }

}
 ?>