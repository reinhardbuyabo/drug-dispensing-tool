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
    $sql = "INSERT INTO patient (first_name, last_name, email, phone, patient_id, username, password, user_type) VALUES ('$first_name', '$last_name', '$email', '$phone', '$patient_id', '$username', '$password', '$user_type')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Contact Records Inserted";
        // var_dump($_SESSION);
        echo "<br><a href='displayUsers.php'>Display Users</a>";
    }
} else {
    echo "Are you a genuine visitor?";
}
