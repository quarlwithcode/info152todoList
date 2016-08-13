<html>
<head>
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <main class="wrap">
    	<div class="task-list">
     		<ul>
                <?php require("connect.php"); 
                
                $query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
                $numrows = $db->query($query);

                if($numrows>0){
                   foreach($numrows as $single){
                        $task_id = $single['id'];
                        $task_name = $single['task'];
                        echo '<li><span>'.$task_name.'</span><button id="'.$task_id.'" class="delete-button">Delete</button></li>';
                    }
                }
                ?>
     		</ul>
 		</div>
 		<form class="add-new-task" autocomplete="off" action="add-task.php" method="post">
      		<input type="text" name="new-task" placeholder="Add a new item..." />
      		<input type="submit" value="Submit">
 		</form>
    </main>
</body>
</html>