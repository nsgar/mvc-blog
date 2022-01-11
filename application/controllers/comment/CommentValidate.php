<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\comment; 
  
class CommentValidate
{

   public $comment;
   public $userName;
   public $postId;
   public $userId;

 function __construct($post)
 {
     foreach ($post as $key => $value) {
         if (property_exists($this, $key)) {
             $this->{$key} = $value;
         }
     }
 }

 public function validate()
 {
     $comment = [];
     
     if ($this->comment  == '') {
        $comment['error']['text'] = 'Enter Comment';
     }else {
         $comment['text'] = $this->comment;
     }

     if (isset($_SESSION['token'])) {
        $this->username = $_SESSION['token']; 
     }else {
        die('Login Falied'); 
     }
     
     if (isset($_GET['postid'])) {
        $this->postId = $_GET['postid'];
     }else {
        die('Login Falied'); 
     }
     
     if (isset($_SESSION['user_id'])) {
        $this->userId = $_SESSION['user_id'];
     }else {
        die('Login Falied'); 
     }
     
     return $comment;
  
}



}
 ?>