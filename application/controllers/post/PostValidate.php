<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\post; 
  
class PostValidate
{

 public string $title;
 public string $text;
 public $userId;


 public function __construct($post)
 {
    foreach ($post as $key => $value) {
             
        if (property_exists($this, $key)) {
              $this->{$key} = $value;
          }
      }
 }

public function validate()
{
    $post = [];
    
    if ($this->title == "") {
        $post['error']['title'] = 'Enter title';
    }else{
        $post['title'] = $this->title;
    }
    
    if ($this->text == "") {
        $post['error']['text'] = 'Enter text';
    }else{
        $post['text'] = $this->text;
    }

    if (isset($_SESSION['user_id'])) {
       $this->userId = $_SESSION['user_id'];
    }else {
        die('login failed');
    }

                                    
    return $post;
    
}

}
 ?>