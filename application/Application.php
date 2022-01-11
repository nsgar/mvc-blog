<?php
declare(strict_types=1);
  
namespace mvc\app;
use mvc\app\core\Route; 
use mvc\app\core\Request;
use mvc\app\core\Response;
use mvc\app\core\Session;
use mvc\app\core\View;
use mvc\app\database\ConnectionDB;

class Application
{
    public Session $session;
    public Route $route;
    public Response $response;
    public Request $request;
    public static Application $app;
    public string $root;
    public View $view;
    public ConnectionDB $db;

    function __construct(array $config)
    {
        $this->session = new Session();
        $this->response = new Response();
        $this->request = new Request();
        $this->route = new Route($this->request, $this->response);
        $this->view = new View();
        self::$app = $this;
        $this->root = dirname(__DIR__);
        $this->db = new ConnectionDB($config);
      
    }


    public function run() : void
    {
       echo $this->route->resolve();
    }

    public function view($view, $data = [])
    {
        return $this->view->renderView($view, $data);
    }

    public function db()
    {
        return $this->db->conn();
    }

  

}
 ?>