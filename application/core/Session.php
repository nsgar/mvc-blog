<?php
declare(strict_types=1);
  
namespace mvc\app\core;

use finfo;
use mvc\app\Application;

class Session
{

 function __construct()
 {
    session_start();
 }   


 public function setSession($token, $email, $userId)
 {
      $_SESSION[$token] = $email;
      $_SESSION['user_id'] = $userId;
 }

 public function checkSession($email)
 {

   $stm = Application::$app->db()->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
   $stm->execute([$email]);
   $result = $stm->fetchAll(\PDO::FETCH_ASSOC);
   
   if ($result) {
     return $_SESSION['token'] === $result[0]['email'] ? $email : false;  //Set Session time;
   }else{
     return false;
   }
   
 }

 public function destroy()
 {
    return session_destroy();
 }

}
 ?>