<?php
if (isset($_POST['submit'])) {
    // $con = mysqli_connect('localhost', 'root', '', 'drug_dispensing_tool');
    require_once 'connect.php';

    $user_type = $_POST['user_type'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    // database insert SQL code
    $sql = "UPDATE " . $user_type . " SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone ='$phone', username ='$username', password = '$password' WHERE " . $user_type . "_id=" . $id;

    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo "Records Edited Successfully";

        if ($user_type == 'doctor') {
            header('location: display_doctors.php');
        } else if ($user_type == 'patient') {
            header('location: display_users.php');
        } else if ($user_type == 'pharmacist') {
            header('location: display_pharmacists.php');
        }

        // var_dump($_SESSION);
    }
} else {
    echo "Something Went Wrong!";
}
