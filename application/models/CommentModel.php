<?php
declare(strict_types=1);
  
namespace mvc\app\models;

use mvc\app\Application;

class CommentModel
{

 public function createComment($comment)
 {
    $sql = "INSERT INTO comments (username, comment, user_id, post_id)
    VALUES ('$comment->username', '$comment->comment', '$comment->userId', '$comment->postId')";
    return Application::$app->db()->exec($sql);
 }
 
 
 public function allComment()
 {
    $stmt = Application::$app->db()->query("SELECT * FROM comments"); 
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    if ($result) {
        return $result;
    }
 }

}
 ?>