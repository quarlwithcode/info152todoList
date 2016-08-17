<?php include "connect.php"; ?>
<!DOCTYPE html>
<html>
<head>  
<title>Register</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>  
<body>  
<main class="wrap" >
   <div id="register-wrapper">
    <?php
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];

            $checkusernameQuery = "SELECT * FROM users WHERE Username = '".$username."'";
            $rows = $db->query($checkusernameQuery)->fetchAll();
            $numrows = count($rows);

             if($numrows > 0)
             {
                echo "<h1>Error</h1>";
                echo "<p>Sorry, that username is taken. Please go back and try again.</p>";
             }
             else
             {
                $registerQuery = "INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')";
                 
                if($db->query($registerQuery))
                {
                    echo $numrows;
                    echo "<h1>Success</h1>";
                    echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";
                }
                else
                {
                    echo "<h1>Error</h1>";
                    echo "<p>Sorry, your registration failed. Please go back and try again.</p>";    
                }       
             }
        }
        else
        {
    ?>

       <h1>Register</h1>

       <p>Please enter your details below to register.</p>

        <form method="post" action="register.php" name="registerform" id="registerform">
        <fieldset>
           <div>
                <label for="username">Username:</label><input type="text" name="username" id="username" />
            </div>
            <div>
                <label for="password">Password:</label><input type="password" name="password" id="password" />
            </div>
            <div>
                <label for="email">Email Address:</label><input type="text" name="email" id="email" />
            </div>
            <input type="submit" name="register" id="register" value="Register" />
        </fieldset>
        </form>

    <?php
        }
    ?>
    </div>
</main>
</body>
</html>