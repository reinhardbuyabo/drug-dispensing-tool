<?php
require 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Page</title>
    <script src="https://kit.fontawesome.com/9e862feeff.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/homes.css">
</head>

<body>

    <div class="banner">
        <div class="navbar">
            <h2><?php
                if (isset($_GET['name'])) {
                    echo "welcome " . $_GET['name'];
                    $_SESSION["name"] = $_GET['name'];
                }
                ?>
            </h2>
            <ul>
                <li><a href="display_users.php?user_type=doctor">Patients</a></li>
                <li><a href="display_pharmacists.php">Pharmacists</a></li>
                <li><a href="display_drugs.php?user_type=admin">Drugs</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>DOCTOR'S INTERFACE</h1>
            <p><span>Note:</span> This page is for doctors only!</p>


            <div class="wrapper">
                <form class="input-group" method="post">
                    <div class="input-field">
                        <input type="text" name="search" id="search" placeholder="Username To Search">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <button class="submit-btn" name="submit">Search</button>
                </form>

            </div>

            <div class="wrapper-table">
                <table class="content-table">
                    <?php
                    if (isset($_POST["submit"])) {
                        $search = $_POST["search"];

                        $sql = "SELECT * FROM patient WHERE username = '$search'";
                        $result = mysqli_query($conn, $sql);
                        $drugs = "SELECT drug_id, generic_name FROM drug";
                        $fetched_drugs = mysqli_query($conn, $drugs);

                        if ($result) {
                            $num = mysqli_num_rows($result);
                            // echo $num;

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

                                $drugList = ''; // Initialize an empty string

                                while ($drug = mysqli_fetch_assoc($fetched_drugs)) {
                                    $drugList .= '<li><a href="prescribe.php?drug_id=' . $drug['drug_id'] . '&patient_id=' . $row['patient_id'] . '">' . $drug['generic_name'] . '</a></li>';
                                }

                                echo '<tbody>
                            <tr>
                                <td>' . $row['patient_id'] . '</td>
                                <td>' . $row['first_name'] . '</td>
                                <td>' . $row['last_name'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['phone'] . '</td>
                                <td>' . $row['username'] . '</td>
                                <td>
                                    <ul class="menu">
                                        <li><a href="#"><a href="#">Prescribe Drug</a></a>
                                            <ul class="submenu">
                                                ' . $drugList . '
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                        
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
    </div>
</body>

</html>