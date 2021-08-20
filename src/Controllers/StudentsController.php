<?php

namespace mvc\src\Controllers;

use mvc\src\Core\Controller;
use mvc\src\Models\StudentModel;
use mvc\src\Models\StudentRepository;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->studentRepository = new StudentRepository();
    }

    function index()
    {
        $student = new StudentModel();
        $d['students'] = $this->studentRepository->getAll($student);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        extract($_POST);
        if (
            !empty(isset($_POST['name'])) &&
            !empty(isset($_POST['age'])) &&
            !empty(isset($_POST['adress']))
        ) {
            $student = new StudentModel();
            $student->name = $name;
            $student->age = $age;
            $student->adress = $adress;
            if ($this->studentRepository->create($student)) {
                header("Location: " . WEBROOT . "students");
            } else {
                echo "wrong";
                die;
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $d["students"] = $this->studentRepository->get($id);
        if (isset($_POST["name"])) {
            $student = new StudentModel();
            $student->setId($id);
            $student->setName($_POST["name"]);
            $student->setAge($_POST["age"]);
            $student->setAdress($_POST["adress"]);
            if ($this->studentRepository->edit($student)) {
                header("Location: " . WEBROOT . "students");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $student = new StudentRepository();
        if ($student->delete($id)) {
            header("Location: " . WEBROOT . "students");
        }
    }
}
