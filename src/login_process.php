<?php
require_once("connect.php");
session_start();

// Checking if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Getting the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patient WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login Successfull
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_type'] = $row['user_type'];

        // Redirect the user based on user type
        if ($_SESSION['user_type'] == 'admin') {
            header("Location: admin.php");
        } else if ($_SESSION['user_type'] == 'patient') {
            header("Location: user.php");
        }
    } else {
        // Login Failed
        echo "Invalid username or password";
    }

    $conn->close();
}
