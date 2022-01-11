<?php
declare(strict_types=1);
  
namespace mvc\app\core;

use mvc\app\Application;

class Route
{

  private $path = [];
  public Request $request;
  public Response $response;
  public View $view;
  function __construct(Request $request, Response $response)
  {
      $this->request = $request;
      $this->response = $response;
      $this->view = new View();
  }

  public function get(string $url, $callback)
  {
      return $this->path['get'][$url] = $callback;
  }

  public function post(string $url, $callback)
  {
     return $this->path['post'][$url] = $callback;
  }


  public function resolve()
  {
      $url = $this->request->getUrl();
      $method = $this->request->getMethod();
      $callback = $this->path[$method][$url] ?? false;

      if ($callback) {

         if (is_array($callback)) {
            return call_user_func($callback, $this->request);
         }

         if (is_string($callback)) {
            echo Application::$app->view($callback);
            exit;
         }

         return call_user_func($callback);
         
      }else {
          $this->response->statusCode(404);
          echo $this->view->page404();
      }
  }


}
 ?>