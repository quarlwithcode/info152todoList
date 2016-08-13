<?php 
    $task_id = strip_tags( $_POST['task_id'] );
    require("connect.php");
    $query = "DELETE FROM tasks WHERE id='$task_id'";

    $db -> exec($query);
?>