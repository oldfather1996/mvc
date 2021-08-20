<?php

namespace Mvc\Src\Views\Tasks;

?>

<h1><a href="../mvc">Student</a></h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="../mvc/students/create" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
            <a></a>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>age</th>
                <th>adress</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($students as $student) {
            echo '<tr>';
            echo "<td>" . $student['id'] . "</td>";
            echo "<td>" . $student['name'] . "</td>";
            echo "<td>" . $student['age'] . "</td>";
            echo "<td>" . $student['adress'] . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/mvc/students/edit/" .
                $student["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/mvc/students/delete/" .
                $student["id"] . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>