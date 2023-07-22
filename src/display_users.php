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

            <?php
            // Retrieve user details from the database
            require_once("connect.php");

            if ($_GET['user_type'] == 'doctor' or $_GET['user_type'] == 'admin') {
                $user = $_GET['user_type'];
                $tHead1 = '<thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>';
                echo $tHead1;

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
            } else if ($_GET['user_type'] == 'pharmacist') {
                $tHead2 = '<thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Drug Name</th>
                            
                            <th>Dispense</th>
                        </tr>
                    </thead>';
                echo $tHead2;
                // Pagination configuration
                $itemsPerPage = 10; // Number of items to display per page
                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page number

                $offset = ($currentPage - 1) * $itemsPerPage; // Calculate the offset

                $query = "SELECT * FROM patient LIMIT $offset, $itemsPerPage";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $prescription_query = "SELECT * FROM prescriptions WHERE patient_id = " . $row['patient_id'];
                        $prescription_result = mysqli_query($conn, $prescription_query);

                        // $res = (mysqli_num_rows($prescription_result) > 0) ? mysqli_fetch_assoc($prescription_result) : null;

                        if (mysqli_num_rows($prescription_result) > 0) {
                            $res = mysqli_fetch_assoc($prescription_result);
                            $drug_query = "SELECT generic_name FROM drug WHERE drug_id IN (SELECT drug_id FROM prescriptions WHERE patient_id = " . $row['patient_id'] . ")";

                            $drug_res = mysqli_query($conn, $drug_query);


                            $drugList = ''; // Initialize an empty string

                            $drugs_array = array();
                            $total_price = 0;
                            while ($drug = mysqli_fetch_assoc($drug_res)) {
                                $drugList .= '<li class="item">' . $drug['generic_name'] . '</li>';
                                array_push($drugs_array, $drug['generic_name']);
                            }

                            echo "<tr>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo '<td>
                            <ul class="menu">
                                <li><a href="#"><a href="#">Prescribe Drug</a></a>
                                    <ul class="submenu">
                                        ' . $drugList . '
                                    </ul>
                                </li>
                            </ul>
                            </td>';
                            // echo "<td>" . $res['dosage_amount_gms'] . "</td>";
                            // echo "<td>" . $res['price'] . "</td>";

                            $serializedData = serialize($drugs_array);
                            $encodedData = urlencode($serializedData);
                            $total_price += $res['price'];
                            $redirect_url = 'dispense.php?' . http_build_query(array('drugs' => $encodedData, 'patient_id' => $row['patient_id'], 'total_price' => $total_price));

                            echo '<td><a href="' . $redirect_url . '">Dispense</a></td';

                            echo "</tr>";
                        } else {
                            $res = null;
                            echo "<tr>";
                            echo "<td>" . $row['first_name'] . "</td>";
                            echo "<td>" . $row['last_name'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $res . "</td>";
                            // echo "<td>" . $res . "</td>";
                            // echo "<td>" . $res . "</td>";
                            echo "<td>Cannot Dispense</td";

                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found.</td></tr>";
                }
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
            echo "<a href='?user_type=$user&page=$i'>$i</a> ";
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