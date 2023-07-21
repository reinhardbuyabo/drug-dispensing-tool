<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="stylesheet" href="../styles/tables.css">
</head>

<body>
    <div class="wrapper">
        <table class="content-table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            // Retrieve user details from the database
            require_once("connect.php");

            // Pagination configuration
            $itemsPerPage = 10; // Number of items to display per page
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number

            $offset = ($currentPage - 1) * $itemsPerPage; // Calculate the offset

            $query = "SELECT * FROM patient LIMIT $offset, $itemsPerPage";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row['patient_id'] . "'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=" . $row['patient_id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No users found.</td></tr>";
            }
            ?>
        </table>

        <?php
        // Pagination links
        $query = "SELECT COUNT(*) AS total FROM patient";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $totalItems = $row['total']; // Total number of items from db.

        $totalPages = ceil($totalItems / $itemsPerPage); // Calculating total number of pages

        echo "<div>";
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<a href='?page=$i'>$i</a> ";
        }
        echo "</div>";
        mysqli_close($conn);
        ?>

        <p>
            <a href="./register.php?user_type=patient">Add User</a>
        </p>
    </div>
</body>

</html>