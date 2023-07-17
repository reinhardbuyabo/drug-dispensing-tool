<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>

    <a href="./display_users.php">Display All Users</a>

    <h2>Welcome, <?php session_start();
                    print_r($_SESSION); ?></h2>
    <p>This is the Admin page</p>

    <p><a href="./doctor_form.html">Add A Doctor</a></p>
    <p><a href="./pharmacist_form.html">Add A Pharmacist</a></p>
</body>

</html>