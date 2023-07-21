<?php
require_once 'connect.php';
session_start();
if (!isset($_SESSION['username']) || $_SESSION['user_type'] != 'patient') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="../styles/homes.css">
</head>

<body>

    <div class="banner">
        <div class="navbar">
            <h2><?php
                if (isset($_GET['name'])) {
                    echo "welcome " . $_GET['name'];
                }
                ?>
            </h2>
            <ul>
                <li><a href="display_drugs.php?user_type=patient">Drugs</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>WELCOME TO OUR PHARMACY</h1>
            <p><span>Note:</span> This page is for authorized users only!</p>

            <div>
                <form method="post">
                    <button name="submit" type="submit"><span></span>VIEW HISTORY</button>
                </form>
            </div>

            <?php
            if (isset($_POST['submit'])) {
                $get_user = "SELECT patient_id FROM patient WHERE username = '" . $_SESSION['username'] . "'";
                $user_res = mysqli_query($conn, $get_user);
                $patient_id = mysqli_fetch_assoc($user_res)['patient_id'];

                // $drug_query = "SELECT generic_name FROM drug WHERE drug_id IN (SELECT drug_id FROM prescriptions WHERE patient_id = " . $row['patient_id'] . ")";
                $drug_query = "SELECT generic_name, dosage_amount_gms FROM (drug LEFT JOIN prescriptions ON drug.drug_id = prescriptions.drug_id) LEFT JOIN patient ON prescriptions.patient_id = patient.patient_id WHERE patient.patient_id = " . $patient_id;
                $drug_res = mysqli_query($conn, $drug_query);

                // print_r($drug_res);
                $drugList = ''; // Initialize an empty string

                $count = 0;
                while ($drug = mysqli_fetch_assoc($drug_res)) {
                    $name = $drug['generic_name'];
                    $dosage = $drug['dosage_amount_gms'];
                    $drugList .= '
                    <p class="input-field">
                        <label> Drug ' . ++$count  . '</label>
                        <input type="text" value="' . $name . '" readonly>
                    </p>
                    <p class="input-field">
                        <input type="text" value="' . $dosage . ' gms" readonly>
                    </p>
                    ';
                }
            }
            ?>

            <div class="wrapper">
                <form>
                    <?php
                    if (isset($drugList)) {
                        echo $drugList;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>