<?php

namespace mvc\src\Models;

class TaskRepository
{
    protected $taskResouce;

    public function __construct()
    {
        $this->taskResouce = new TaskResourceModel('tasks', null, new TaskModel);
    }
    public function create($model)
    {
        return $this->taskResouce->save($model);
    }
    public function getAll()
    {
        return $this->taskResouce->getAll();
    }
    public function get($model)
    {
        return $this->taskResouce->get($model);
    }
    public function edit($id, $title, $description)
    {
        return $this->taskResouce->edit($id, $title, $description);
    }
    public function delete($model)
    {
        return $this->taskResouce->delete($model);
    }
}
