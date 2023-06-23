<?php
if (isset($_POST['submit'])) {
    $con = mysqli_connect('localhost', 'root', '', 'drug_dispensing_tool');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $patient_id = $_POST['patient_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = "patient";

    // database insert SQL code
    $sql = "UPDATE patient SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone ='$phone', username ='$username', password = '$password' WHERE patient_id=" . $patient_id;

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "User's Record Edited Successfully";
        // var_dump($_SESSION);
    }
} else {
    echo "Something Went Wrong!";
}
