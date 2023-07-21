<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
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
                <li><a href="display_doctors.php">Doctors</a></li>
                <li><a href="display_users.php?user_type=admin">Patients</a></li>
                <li><a href="display_pharmacists.php">Pharmacists</a></li>
                <li><a href="display_drugs.php?user_type=admin">Drugs</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>MANAGE THIS SYSTEM</h1>
            <p><span>Note:</span> This page is for authorized users only!</p>

            <div>
                <button type="button"><span></span>ADD USER</button>
                <button type="button"><span></span><a href="add_drug.php">ADD DRUG</a></button>
            </div>
        </div>
    </div>

    <!-- <p>This is the Admin Page</p>

    <a href="./display_users.php">Display All Users</a>

    <a href="./doctor_form.html">Add A Doctor</a>
    <a href="./pharmacist_form.html">Add A Pharmacist</a> -->
</body>

</html>