<?php
require_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescribe Page</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
    <?php

    if (isset($_GET['drugs'])  && isset($_GET['patient_id'])) {

        $patient_sql = "SELECT * FROM patient WHERE patient_id = " . $_GET['patient_id'];
        $patient_result = mysqli_query($conn, $patient_sql);
        $patient_row = mysqli_fetch_assoc($patient_result);
        $receivedDrugs = unserialize(urldecode($_GET['drugs']));
        // print_r($receivedDrugs);

        $count = 0;
        $drugs = '';
        foreach ($receivedDrugs as $drug) {
            $drugs .= '
                <p class="input-field">
                    <label for="patient_id"> Drug ' . ++$count  . '</label>
                    <input type="text" name="" id="patient_id" value="' . $drug . '" readonly>
                </p>';
        }
    ?>
        <div class="wrapper">
            <form method="POST">
                <h1>Prescribe Drug Here</h1>
                <p class="input-field">
                    <label for="patient_id">Patient ID </label>
                    <input type="text" name="patient_id" id="patient_id" value="<?php echo $patient_row['patient_id']; ?>" readonly>
                </p>
                <p class="input-field">
                    <label for="username">Username </label>
                    <input type="text" name="username" id="username" value="<?php echo $patient_row['username']; ?>" readonly>
                </p>

                <?php
                echo $drugs;
                ?>

                <p class="input-field">
                    <label for="price">Total Price in Kshs </label>
                    <input type="text" name="price" id="price" value="<?php echo $_GET['total_price']; ?>">
                </p>

                <p>
                    <input class="submit-btn" type="submit" name="submit" id="submit" value="Dispense Drug">
                </p>
            </form>
        </div>
    <?php

        if (isset($_POST["submit"])) {
            print_r($_POST);
            $dispense_sql = "INSERT INTO dispensations (patient_id, drug_count, total_price) VALUES (" . $_POST['patient_id'] . ", " . $count .  ", " . $_GET['total_price'] . ")";

            $res = mysqli_query($conn, $dispense_sql);

            if ($res) {
                echo "<p>Records Added Successfully</p>";
                header('Location: pharmacist.php');
            }
        }
    } else {
        echo "alert('No ID's Specified')";
    }

    mysqli_close($conn); // Close the database connection
    ?>
</body>

</html>