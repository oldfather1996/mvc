<?php

namespace mvc\src\Core;

class Controller
{
    var $vars = [];
    var $layout = "default";
    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        extract($this->vars);
        ob_start();
        $url = ($_SERVER["REQUEST_URI"]);
        $url = explode('/', $url);
        if ($url[2] === "students") {
            require(ROOT . "Views/" . ucfirst(str_replace(get_class($this), 'students/', get_class($this))) . $filename . '.php');
        } else {
            require(ROOT . "Views/" . ucfirst(str_replace(get_class($this), 'tasks/', get_class($this))) . $filename . '.php');
        }
        $content_for_layout = ob_get_clean();
        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }
}
