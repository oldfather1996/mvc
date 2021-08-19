<?php

namespace mvc\src\Controllers;

use mvc\src\Core\Controller;
use mvc\src\Core\Model;
use mvc\src\Models\TaskModel;
use mvc\src\Models\TaskRepository;

class TasksController extends Controller
{
    function index()
    {
        $task = new TaskModel();
        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->getAll($task);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task = new TaskRepository();
            if ($task->create($_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT);
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task = new TaskRepository();
        $d["task"] = $task->get($id);
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
        $task = new TaskRepository();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT);
        }
    }
}
