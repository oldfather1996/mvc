<?php

namespace mvc\src\Models;

class TaskRepository
{
    protected $taskResouce;

    public function __construct()
    {
        $this->taskResouce = new TaskResourceModel('tasks', null, new TaskModel);
    }

    public function getAll()
    {
        return $this->taskResouce->getAll();
    }

    public function create($model)
    {
        return $this->taskResouce->save($model);
    }

    public function get($id)
    {
        return $this->taskResouce->get($id);
    }

    public function edit($id, $title, $description)
    {
        return $this->taskResouce->edit($id, $title, $description);
    }

    public function delete($id)
    {
        return $this->taskResouce->delete($id);
    }
}
