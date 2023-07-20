<?php
session_start(); // Start or resume the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    // Form is submitted, handle the form data
    $patient = $_POST["patient"];

    // Update session variables based on form data
    if (!empty($patient)) {
        $_SESSION["patient"] = $patient;
    }
    echo print_r($_SESSION);
}

// ... Your other PHP code ...

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage System</title>
    <link rel="stylesheet" href="../styles/homes.css">
</head>

<body>
    <div class="banner">
        <!-- ... (Other content) ... -->

        <div class="navbar">
            <h2><?php
                $_SESSION = $_GET;
                if (isset($_SESSION['name'])) {
                    echo "welcome " . $_SESSION['name'];
                }
                ?>
            </h2>
            <ul>
                <li><a href="display_users.php">Patients</a></li>
                <li><a href="display_pharmacists.php">Pharmacists</a></li>
                <li><a href="display_drugs.php?user_type=doctor">Drugs</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>MANAGE THIS SYSTEM</h1>
            <p><span>Note:</span> This page is for authorized users only!</p>

            <div class="search">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="text" name="patient" id="search_patient">

                    <!-- Add the button inside the form with type="submit" -->
                    <input type="submit""><span></span>

                </form>
            </div>

            <!-- ... (Other content) ... -->

        </div>
    </div>
</body>

</html>



<!-- <!DOCTYPE html>
<html lang=" en">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Doctor Page</title>
                        <link rel="stylesheet" href="../styles/homes.css">
                    </head>

                    <body>

                        <div class="banner">
                            <div class="navbar">
                                <h2><?php
                                    session_start();
                                    $_SESSION = $_GET;
                                    if (isset($_SESSION['name'])) {
                                        echo "welcome " . $_SESSION['name'];
                                    }
                                    ?>
                                </h2>
                                <ul>
                                    <li><a href="display_users.php">Patients</a></li>
                                    <li><a href="display_pharmacists.php">Pharmacists</a></li>
                                    <li><a href="display_drugs.php?user_type=doctor">Drugs</a></li>
                                </ul>
                            </div>

                            <div class="content">
                                <h1>MANAGE THIS SYSTEM</h1>
                                <p><span>Note:</span> This page is for authorized users only!</p>

                                <div class="search">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <input type="text" name="patient" id="search_patient">
                                        <button type="submit" onclick="<?php echo $onClickHandler; ?>"><span></span>SEARCH PATIENT</button>
                                    </form>
                                    <?php
                                    if (isset($_POST['patient'])) {
                                        $onClickHandler = "<h2>Hello Patient</h2>";
                                    } else {
                                        $onClickHandler = "alert('No such patient exists')";
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>

                        <!-- <p>This is the doctor Page</p>

    <a href="./display_users.php">Display All Users</a>

    <a href="./doctor_form.html">Add A Doctor</a>
    <a href="./pharmacist_form.html">Add A Pharmacist</a> -->
                    </body>

</html> -->