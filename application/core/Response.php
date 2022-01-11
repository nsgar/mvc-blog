<?php
declare(strict_types=1);
  
namespace mvc\app\core; 
  
class Response
{

 function statusCode($code)
 {
     return http_response_code($code);
 }

}
 ?>