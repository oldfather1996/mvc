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

    public function save($model){
        $sql = "INSERT INTO tasks (title, description, created_at, updated_at) VALUES (:title, :description, :created_at, :updated_at)";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
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
        $myId =  $this->id;
        $sql = "SELECT * FROM $this->table WHERE id =$myId";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return ($req->fetchObject());
    }

    public function edit($id, $title, $description)
    {
        $sql = "UPDATE tasks SET title = :title, description = :description , updated_at = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s')

        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM tasks WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }
}
