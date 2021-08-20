<?php

namespace mvc\src\Controllers;

use mvc\src\Core\Controller;
use mvc\src\Models\TaskModel;
use mvc\src\Models\TaskRepository;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }

    function index()
    {
        $task = new TaskModel();
        $d['tasks'] = $this->taskRepository->getAll($task);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        extract($_POST);
        if (!empty(isset($_POST['title'])) && !empty(isset($_POST['description']))) {
            $task = new TaskModel();
            $task->title = $title;
            $task->description = $description;
            if ($this->taskRepository->create($task)) {
                header("Location: " . WEBROOT);
            } else {
                echo "wrong";
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $d["tasks"] = $this->taskRepository->get($id);
        if (isset($_POST["title"])) {
            $task = new TaskModel();
            $task->setId($id);
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            if ($this->taskRepository->edit($task)) {
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
