<?php

namespace mvc\src\Models;

use mvc\src\Core\ResouceModel;

class TaskResourceModel extends ResouceModel
{
    public function __construct($table, $id, TaskModel $task)
    {
        ResouceModel::_init($table, $id, $task);
    }
}
