<?php

namespace mvc\src\Models;

use mvc\src\Core\Model;

class TaskModel extends Model
{
    public $title;
    public $description;
    public $created_at;
    public $updated_at;
    public $id;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setCreate_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreate_at()
    {
        return $this->created_at;
    }

    public function setUpdate_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdate_at()
    {
        return $this->updated_at;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
}
