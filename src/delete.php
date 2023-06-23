<?php
require_once("connect.php");

// Delete user from the database based on the provided ID

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM patient WHERE patient_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
