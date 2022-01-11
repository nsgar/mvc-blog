<?php
declare(strict_types=1);
  
namespace mvc\app\models;

use mvc\app\Application;

class PostModel
{
  
 public function createPost($post)
 {   
     $sql = "INSERT INTO posts (title, body, user_id)
     VALUES ('$post->title', '$post->text', $post->userId)";
     return Application::$app->db()->exec($sql);
 }


 public function allPosts()
 {
    $stmt = Application::$app->db()->query("SELECT * FROM posts"); 
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    if ($result) {
        return $result;
    }
 }

 public function postById($id)
 {
    $stmt = Application::$app->db()->prepare("SELECT * FROM posts WHERE id=? LIMIT 1"); 
    $stmt->execute([$id]);
    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return array_shift($result);
 }

}
 ?>