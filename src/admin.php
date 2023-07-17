<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>

    <h2>
        <?php
        if (isset($_GET['name'])) {
            echo "Welcome " . $_GET['name'];
        }
        ?>
    </h2>

    <p>This is the Admin Page</p>

    <a href="./display_users.php">Display All Users</a>


    <p><a href="./doctor_form.html">Add A Doctor</a></p>
    <p><a href="./pharmacist_form.html">Add A Pharmacist</a></p>
</body>

</html>