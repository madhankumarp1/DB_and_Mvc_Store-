<?php

session_start();

$db = require("../model/DB.php");
$config = require('../config.php');
$databaseConnection = new DatabaseConnection($config);
$conn = $databaseConnection->getConnection();

if(isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['course'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $course = $_POST['course'];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user_recode (name, email, password, course) VALUES ('$name', '$email', '$hashedPassword', '$course')";


    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header("Location: ../view/login.html");
        exit;
    } else {
        echo "Error: Registration failed - " . $conn->error;
    }
} else {
    echo "Invalid input data";
}


$conn->close();

?>
