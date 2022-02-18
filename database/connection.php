<?php 
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "aic3_pomodoro";
    $conn = new PDO('mysql:host=' . $host . ';dbname=' . $database, $user, $password);
?>