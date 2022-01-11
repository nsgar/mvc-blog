<?php
declare(strict_types=1);
  
namespace mvc\app\core;

use mvc\app\Application;

class View
{

    public function renderView($view, $data = [])
    {
        $page = $this->includeView($view, $data);
        $layout = $this->includeLayout();
        return str_replace ('contentpage',$page, $layout);
    }

    public function page404()
    {
        $page = $this->includeView('page404');
        $layout = $this->includeLayout();
        return str_replace ('contentpage',$page, $layout);
    }
   
    public function includeView($view, $data = [])
    {
        $data;
        ob_start();
        include Application::$app->root."/application/views/$view.php";
        return ob_get_clean();
    }
   
    public function includelayout()
    {
        ob_start();
        include Application::$app->root."/application/views/layouts/main.php";
        return ob_get_clean();
    }


}
 ?>