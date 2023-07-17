<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>User Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        // Retrieve user details from the database
        require_once("connect.php");

        // Pagination configuration
        $itemsPerPage = 10; // Number of items to display per page
        $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number

        $offset = ($currentPage - 1) * $itemsPerPage; // Calculate the offset

        $query = "SELECT * FROM pharmacist LIMIT $offset, $itemsPerPage";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['user_type'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['pharmacist_id'] . "&user_type=" . $row['user_type'] . "'>Edit</a></td>";
                echo "<td><a href='delete.php?id=" . $row['pharmacist_id'] . "&user_type=" . $row['user_type'] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found.</td></tr>";
        }
        ?>
    </table>

    <?php
    // Pagination links
    $query = "SELECT COUNT(*) AS total FROM pharmacist";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalItems = $row['total']; // Total number of items from db.

    $totalPages = ceil($totalItems / $itemsPerPage); // Calculating total number of pages

    echo "<div style='margin-top: 10px;'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
    echo "</div>";
    mysqli_close($conn);
    ?>

    <p>
        <a href="./pharmacist_form.html">Add Pharmacist</a>
    </p>
</body>

</html>