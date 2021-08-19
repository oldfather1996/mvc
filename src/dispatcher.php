<?php

namespace mvc\src;

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
        die;
    }

    public function loadController()
    {
        // $name = $this->request->controller . 'Controller';
        // $file = ROOT . 'src/Controllers/' . $name . '.php';\
        // $TName = "mvc\src\Controllers\TasksController";
        $name = ucfirst($this->request->controller) . "Controller";
        $file = "mvc\\src\Controllers\\" . $name;
        $controller = new $file();
        return $controller;
    }
}
