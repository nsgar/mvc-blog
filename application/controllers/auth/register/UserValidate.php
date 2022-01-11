<?php
declare(strict_types=1);
  
namespace mvc\app\controllers\auth\register;

use mvc\app\Application;

class UserValidate
{

    public string $firstname;
    public string $lastname;
    public string $email;
    public string $confirmEmail;
    public string $password;
    public string $confirmPassword;
    

    public function __construct($post)
    {
        
        foreach ($post as $key => $value) {
             
          if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function checkEmail()
    {
        $stmt = Application::$app->db()->prepare("SELECT email FROM users WHERE email=?"); 
        $stmt->execute([$this->email]);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if ($result) {
            return false;
        }
        
    }

    public function validate()
    {
        $validate = [];

        if ($this->firstname === "") {
           
            $validate['error']['firstname'] = 'Enter first names';
        
        }else {
        
            $validate['firstname'] = $this->firstname;
        }

        if ($this->lastname === "") {
        
            $validate['error']['lastname'] = 'Enter last names';
        
        }else {
        
            $validate['lastname'] = $this->lastname;
        }


        // email validate
        if ($this->email === "") {
            
            $validate['error']['email'] = 'Enter email address';
        
        }elseif ($this->email != $this->confirmEmail) {
        
            $validate['error']['email'] = 'Those email didn’t match. Try again.';
        
        }elseif ($this->checkEmail() === false) {
        
            $validate['error']['email'] = 'This email already exists';
        
        }else {
        
            $validate['email'] = $this->email;
        }
       

        // password validate; 
        if ($this->password === "") {

            $validate['error']['password'] = 'Enter your password';

        }elseif(strlen($this->password) < 5) {

            $validate['error']['password'] = 'Your password must be between 5 and 12 characters.';

        }elseif (strlen($this->password) > 12) {
           
            $validate['error']['password'] = 'Your password must be between 5 and 12 characters.';
        
        }elseif ($this->password != $this->confirmPassword) {
            
            $validate['error']['password'] = 'Those passwords didn’t match. Try again.';
        
        }else {
         
            $validate['password'] = $this->password;
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        
        }
        
      
      return $validate;
       

     }
 

}
 ?>