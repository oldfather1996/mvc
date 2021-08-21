<?php

namespace mvc\src\Core;

use mvc\src\Config\Database;
use PDO;

class ResouceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $keyArray = [];
        $properties = $model->getProperties();

        if ($model->id === null) {
            unset($properties['id']);
        }

        foreach ($properties as $key => $value) {
            array_push($keyArray, ':' . $key);
        }

        $valueArray = [];
        foreach (array_keys($properties) as $key => $value) {
            if ($value !== 'id') {
                array_push($valueArray, $value . '= :' . $value);
            }
        }

        $valueArray = implode(',', $valueArray);
        $valueString = implode(',', array_keys($properties));
        $keyString = implode(',', $keyArray);
        if ($model->id === null) {
            $sql = "INSERT INTO $this->table ($valueString) VALUES ($keyString)";
            $req = Database::getBdd()->prepare($sql);
            $date = array("created_at" => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));
            $arrayMerge = (array_merge($properties, $date));
            return $req->execute($arrayMerge);
        } else {
            $fixArray =  str_replace("created_at= :created_at,updated_at= :updated_at", "updated_at= :updated_at", $valueArray);
            $sql = "UPDATE $this->table SET " . $fixArray . ' where id = :id';
            $req = Database::getBDD()->prepare($sql);
            $date = array('updated_at' => date('Y-m-d H:i:s'));
            unset($properties['created_at']);
            return $req->execute(array_merge($properties, $date));
        }
    }

    public function getAll()
    {
        $sql = "SELECT * from $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchAll());
    }

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id =$id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchObject());
    }


    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }
}
