<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple To-Do List</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://use.fortawesome.com/2700b077.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <main class="wrap">
       <?php         
       if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $checkloginQuery = "SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'";
            
            $numrows = $db->query($checkloginQuery);

            if($numrows>0)
            {
                $row = $numrows->fetch();
                $email = $row['EmailAddress'];

                $_SESSION['Username'] = $username;
                $_SESSION['EmailAddress'] = $email;
                $_SESSION['LoggedIn'] = 1;
              
        ?>
                
            <div class="task-list-wrapper"></div>
                <div class="task-list">
                    <ul>
                        <?php require("connect.php"); 

                        $query = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
                        $numrows = $db->query($query);

                        if($numrows>0){
                            foreach($numrows as $single){
                                $task_id = $single['id'];
                                $task_name = $single['task'];
                                echo '<li><span>'.$task_name.'</span><button id="'.$task_id.'" class="delete-button"><i class="fa fa-times"></i></button></li>';
                            }
                        }
                        ?>
                    </ul>
                    </div>
                <form class="add-new-task" autocomplete="off" action="add-task.php" method="post">
                    <input type="text" name="new-task" placeholder="Add a new item..." />
                </form>
                <form class="logout-form" autocomplete="off" action="logout.php" method="post">
                    <input type="submit" name="logout" value="Logout" />
                </form>
            </div>
        <?php 
                
            }
            else
            {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, your account could not be found. Please <a href=\"index.php\">click here to try again</a>.</p>";
            }
        }
        else
        {
        ?>
           <div class="login-wrapper">
                <h1>Member Login</h1>

                <p>Thanks for visiting!</p>
                <p>Please either login below, or <a href="register.php">click here to register</a>.</p>

                <form method="post" action="index.php" name="loginform" id="loginform">
                <fieldset>
                   <div>
                        <label for="username">Username:</label><input type="text" name="username" id="username" />
                    </div>
                    <div>
                        <label for="password">Password:</label><input type="password" name="password" id="password" />
                    </div>
                    <input type="submit" name="login" id="login" value="Login" />
                </fieldset>
                </form>
            </div>
     
       <?php
        }
        ?>
    </main>
</body>
</html>