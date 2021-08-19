<?php

namespace mvc\src\Controllers;

use mvc\src\Core\Controller;
use mvc\src\Models\Task;

class TasksController extends Controller
{
    function index()
    {

        $tasks = new Task();

        $d['tasks'] = $tasks->showAllTasks();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task = new Task();
            if ($task->create($_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT);
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task = new Task();
        $d["task"] = $task->showTask($id);
        if (isset($_POST["title"])) {
            if ($task->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT);
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {

        $task = new Task();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT);
        }
    }
}
