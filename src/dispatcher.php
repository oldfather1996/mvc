<?php

namespace mvc\src;

use mvc\src\Controllers\StudentsController;
use mvc\src\Router;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();

        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();
        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller) . "Controller";
        $file = "mvc\src\Controllers\\" . $name;
        $controller = new $file();
        return $controller;
    }
}
