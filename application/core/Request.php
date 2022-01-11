<?php
declare(strict_types=1);
  
namespace mvc\app\core;
  
class Request
{

    public function redirect($route)
    {
       return header("Location: $route");
    }

    public function getUrl() : string
    {
      $url = $_SERVER['REQUEST_URI'];
      $pos = strpos($url, '?');
      
      if ($pos === false) {
          return $url;
      }
          return substr($url, 0, $pos);
    }

    
    public function getMethod() : string
    {
       return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost()
    {
        return $this->getMethod() === 'post' ?? false;
    }

    
    public function postBody()
    {
        $body = [];

        foreach ($_POST as $key => $value) {
            $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }

}
 ?>