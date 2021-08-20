<?php

namespace mvc\src\Models;

use mvc\src\Core\ResouceModel;

class StudentResourceModel extends ResouceModel
{
    public function __construct($table, $id, StudentModel $student)
    {
        ResouceModel::_init($table, $id, $student);
    }
}
