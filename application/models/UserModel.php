<?php
declare(strict_types=1);
  
namespace mvc\app\models;

use mvc\app\Application;

class UserModel
{
 
    public function createUser($user)
    {
        $token = md5($user->firstname);
        $sql = "INSERT INTO users (firstname, lastname, email, password, token)
        VALUES ('$user->firstname', '$user->lastname', '$user->email', '$user->password', '$token')";
        return Application::$app->db()->exec($sql);
    }

    public function findAllUsers()
    {
        $stmt = Application::$app->db()->query("SELECT * FROM users"); 
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);;
    }

    public function findUserById($id)
    {
        $stmt = Application::$app->db()->prepare("SELECT email FROM users WHERE id=? LIMIT 1"); 
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return array_shift($result);
    }

   

}
 ?>