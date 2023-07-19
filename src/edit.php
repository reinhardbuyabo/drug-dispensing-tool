<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
    <?php
    require_once 'connect.php';

    $user = [];
    if (isset($_GET['id'])  && isset($_GET['user_type'])) {
        $id = $_GET['id'];
        $user_type = $_GET['user_type'];

        $query = "SELECT * FROM " . $user_type . " WHERE " . $user_type . "_id = " . $id;
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through the rows and do something with the data
                while ($row = mysqli_fetch_assoc($result)) {
                    // print_r($row);
                    $user = $row;
                }
    ?>
                <div class="wrapper">
                    <form method="POST" action="edited.php?edit=user">
                        <h1>Edit User Here</h1>
                        <p class="input-field">
                            <label for="first name">First Name </label>
                            <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="last name">Last Name </label>
                            <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" value="<?php echo $user['email']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="phone number">Phone Number</label>
                            <input type="text" name="phone" id="phone" value="<?php echo $user['phone']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="<?php echo $_GET['user_type']; ?> ID"><?php echo $_GET['user_type']; ?> ID</label>
                            <input type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>" readonly>
                        </p>

                        <p class="input-field">
                            <label for=" username">Username </label>
                            <input type="text" name="username" id="username" value="<?php echo $user['phone']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>">
                        </p>

                        <!-- <label for="User Type">User Type</label> -->
                        <input type="text" name="user_type" id="user_type" value="<?php echo $user_type; ?>" hidden>

                        <p>
                            <input class="submit-btn" type="submit" name="submit" id="submit" value="Submit">
                        </p>
                    </form>
                </div>
            <?php

            } else {
                echo "No record found with the specified ID.";
            }
        } else {
            echo "Query execution failed: " . mysqli_error($conn);
        }

        mysqli_free_result($result); // Free the result set
    } else if ($_GET['id']) {
        $drug = [];
        $id = $_GET['id'];

        $query = "SELECT * FROM drug WHERE drug_id = " . $id;
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Loop through the rows and do something with the data
                while ($row = mysqli_fetch_assoc($result)) {
                    // print_r($row);
                    $drug = $row;
                }

            ?>
                <div class="wrapper">
                    <form method="POST" action="edited.php?edit=drug">
                        <h1>Edit Drug Here</h1>
                        <p class="input-field">
                            <label for="drug_id">Drug ID</label>
                            <input type="text" name="drug_id" id="drug_id" value="<?php echo $drug['drug_id'] ?>" readonly>
                        </p>

                        <p class="input-field">
                            <label for="generic_name">Generic Name </label>
                            <input type="text" name="generic_name" id="generic_name" value="<?php echo $drug['generic_name']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="brand name">Brand Name </label>
                            <input type="text" name="brand_name" id="brand_name" value="<?php echo $drug['brand_name']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="dosage">Dosage </label>
                            <input type="text" name="dosage_form" id="dosage" value="<?php echo $drug['dosage_form']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="route_of_administration">Route of Administration </label>
                            <input type="text" name="route_of_administration" id="route_of_administration" value="<?php echo $drug['route_of_administration']; ?>">
                        </p>
                        <p class="input-field">
                            <label for="side_effects">Side Effects </label>
                            <input type="text" name="side_effects" id="side_effects" value="<?php echo $drug['side_effects'] ?>">
                        </p>
                        <p class="input-field">
                            <label for="side_effects">Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" value="<?php echo $drug['expiry_date'] ?>">
                        </p>

                        <!-- <label for="User Type">User Type</label> -->
                        <!-- <input type="text" name="user_type" id="user_type" value="<?php echo $user_type; ?>" hidden> -->

                        <p>
                            <input class="submit-btn" type="submit" name="submit" id="submit" value="Submit">
                        </p>
                    </form>
                </div>
    <?php

                mysqli_free_result($result); // Free the result set
            }
        }
    } else {
        echo "No ID specified.";
    }

    mysqli_close($conn); // Close the database connection
    ?>
</body>

</html>