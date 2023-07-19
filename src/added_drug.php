<?php
include("connect.php"); // if you do not find it, give me a warning,

// Difference between include and require: require() // you have to find connect.php throw a fatal error and stop execution. also you can use include_once() or require_once()

require_once("connect.php");

$generic_name = $_POST['generic_name'];
$brand_name = $_POST['brand_name'];
$dosage_form = $_POST['dosage_form'];
$route_of_administration = $_POST['route_of_administration'];
$side_effects = $_POST['side_effects'];
$expiry_date = $_POST['expiry_date'];

$sql = "INSERT INTO drug (generic_name, brand_name, dosage_form, route_of_administration, side_effects, expiry_date) 
        VALUES ('$generic_name', '$brand_name', '$dosage_form', '$route_of_administration', '$side_effects', '$expiry_date')";

echo ($sql . "<br>");

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: display_drugs.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
