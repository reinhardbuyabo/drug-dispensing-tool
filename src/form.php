<?php
if (isset($_POST['submit'])) {
    $con = mysqli_connect('localhost', 'root', '', 'patient_table');

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $patient_id = $_POST['patient_id'];

    // database insert SQL code
    $sql = "INSERT INTO patient_details (first_name, last_name, email, phone, patient_id) VALUES ('$first_name', '$last_name', '$email', '$phone', '$patient_id')";

    $rs = mysqli_query($con, $sql);
    if ($rs) {
        echo "Contact Records Inserted";
    }
} else {
    echo "Are you a genuine visitor?";
}
