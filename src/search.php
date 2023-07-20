<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <!-- <link rel="stylesheet" href="../styles/homes.css"> -->
</head>

<body>
    <div class="wrapper">
        <form action="" method="post">
            <input type="text" name="search" id="search" placeholder="Username To Search">
            <button class="submit-btn" name="submit">Search</button>
        </form>

        <div class="wrapper">
            <table class="table">
                <?php
                if (isset($_POST["submit"])) {
                    $search = $_POST["search"];

                    $sql = "SELECT * FROM patient WHERE username = '$search'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $num = mysqli_num_rows($result);
                        echo $num;

                        if (mysqli_num_rows($result) > 0) {
                            echo '<thead>
                            <tr>
                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Username</th>
                            <th>Prescribe</th>
                            </tr>
                        </thead>';

                            $row = mysqli_fetch_assoc($result);

                            echo '<tbody>
                            <tr>
                                <td>' . $row['patient_id'] . '</td>
                                <td>' . $row['first_name'] . '</td>
                                <td>' . $row['last_name'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $row['username'] . '</td>
                                <td><a href="prescribe.php">Presribe Drug</a></td>
                        
                            </tr>
                        </tbody>';
                        }
                    } else {
                        echo "<h2>Data Not Found</h2>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>