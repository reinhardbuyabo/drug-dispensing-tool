<?php
require_once("connect.php");

// Delete user from the database based on the provided ID

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && isset($_GET['user_type'])) {
    $id = $_GET['id'];
    $user_type = $_GET['user_type'];

    $query = "DELETE FROM " . $user_type . " WHERE " . $user_type . "_id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
