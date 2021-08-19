<?php

namespace mvc\src\Models;

use mvc\src\Core\Model;

class TaskModel extends Model
{
    private $title;
    private $description;
    private $create_at;
    private $update_at;
    private $id;



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

    public function setCreate_at($create_at)
    {
        $this->create_at = $create_at;
    }

    public function getCreate_at()
    {
        return $this->create_at;
    }

    public function setUpdate_at($update_at)
    {
        $this->update_at = $update_at;
    }

    public function getUpdate_at()
    {
        return $this->update_at;
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
