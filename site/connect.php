<?php
    session_start();

    $dsn = 'mysql:host=localhost;dbname=todoList';
    $username = 'root';
    $password = 'root';

    try {
        $db = new PDO($dsn, $username, $password);
        //echo "worked";
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        //include('database_error.php');
        exit();
    }
?>