<?php 
    $task = strip_tags( $_POST['task'] );
    $date = date('Y-m-d'); // Today%u2019s date
    $time = date('H:i:s'); // Current time

    require("connect.php");

    $query = "INSERT INTO tasks VALUES ('', '$task', '$date', '$time')";
    $db -> exec($query);

    $query = "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time'";

   $rows = $db -> query($query);
    
    foreach($rows as $row){
        $task_id = $row['id'];
        $task_name = $row['task'];
    
        echo '<li><span>'.$task_name.'</span><button id="'.$task_id.'" class="delete-button">Delete</button></li>';
    }
   
?>