<?php
if (isset($_POST['submit'])) {
    $con = mysqli_connect('localhost', 'root', '', 'drug_dispensing_tool');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_type = $_POST['user_type'];
    if ($user_type == 'patient') {
        $id = $_POST['id'];
    } else if ($user_type == 'doctor') {
        $id = $_POST['id'];
    } else if ($user_type == 'pharmacist') {
        $id = $_POST['id'];
    } else if ($user_type == 'admin') {
        $id = $_POST['id'];
    }

    $username = $_POST['username'];
    $password = $_POST['password'];


    // database insert SQL code
    $sql = "INSERT INTO $user_type (first_name, last_name, email, phone, " . $user_type . "_id, username, password, user_type) VALUES ('$first_name', '$last_name', '$email', '$phone', '$id', '$username', '$password', '$user_type')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Contact Records Inserted";
        // var_dump($_SESSION);
        if ($user_type == 'patient') {
            echo "<br><a href='display_users.php?name=" . $username . "'>Display Users</a>";
        } else if ($user_type == 'doctor') {
            echo "<br><a href='display_doctors.php'>Display Doctors</a>";
        } else if ($user_type == 'pharmacist') {
            echo "<br><a href='display_pharmacists.php'>Display Pharmacists</a>";
        } else if ($user_type == 'admin') {
            echo "<br><a href='admin.php?name=" . $username . "'>Admin Page</a>";
        }
    }
} else {
    echo "Are you a genuine visitor?";
}
