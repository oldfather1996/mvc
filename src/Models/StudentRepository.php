<?php

namespace mvc\src\Models;

class StudentRepository
{
    protected $studentResouce;

    public function __construct()
    {
        $this->taskResouce = new StudentResourceModel('students', null, new StudentModel);
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

    public function edit($model)
    {
        return $this->taskResouce->save($model);
    }

    public function delete($id)
    {
        return $this->taskResouce->delete($id);
    }
}
