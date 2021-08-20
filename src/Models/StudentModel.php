<?php

namespace mvc\src\Models;

use mvc\src\Core\Model;

class StudentModel extends Model
{
    public $id;
    public $name;
    public $age;
    public $adress;
    public $created_at;
    public $updated_at;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    public function getAdress()
    {
        return $this->adress;
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
}
