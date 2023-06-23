<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "drug_dispensing_tool";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "Connection Failed: " . $conn->connect_error . "<br/>";
}

// echo "Connection Successful.<br/>";
