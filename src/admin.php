<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>

<body>
    <!-- Todo 1. Capable of editing user information -->
    <!-- Todo 2. Capable of viewing all users -->
    <a href="./displayUsers.php">Display All Users</a>
    <!-- Todo 3. Can Delete users -->
    <h2>Welcome, <?php session_start();
                    print_r($_SESSION); ?></h2>
    <p>This is the Admin page</p>
</body>

</html>