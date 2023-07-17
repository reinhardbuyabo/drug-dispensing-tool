<html>

<head>
</head>

<body>
    <div class="form">
        <form method="POST" action="edited.php">
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
                    } else {
                        echo "No record found with the specified ID.";
                    }
                } else {
                    echo "Query execution failed: " . mysqli_error($conn);
                }

                mysqli_free_result($result); // Free the result set
            } else {
                echo "No ID specified.";
            }

            mysqli_close($conn); // Close the database connection
            ?>
            <p>
                <label for="first name">First Name </label>
                <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>">
            </p>
            <p>
                <label for="last name">Last Name </label>
                <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>">
            </p>
            <p>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo $user['email']; ?>">
            </p>
            <p>
                <label for="phone number">Phone Number</label>
                <input type="text" name="phone" id="phone" value="<?php echo $user['phone']; ?>">
            </p>
            <p>
                <label for="<?php echo $_GET['user_type']; ?> ID"><?php echo $_GET['user_type']; ?> ID</label>
                <input type="text" name="id" id="id" value="<?php echo $_GET['id']; ?>" readonly>
            </p>
            <label for=" username">Username </label>
            <input type="text" name="username" id="username" value="<?php echo $user['phone']; ?>">
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?php echo $user['password']; ?>">
            </p>

            <!-- <label for="User Type">User Type</label> -->
            <input type="text" name="user_type" id="user_type" value="<?php echo $user_type; ?>" hidden>

            <p>
                <input type="submit" name="submit" id="submit" value="Submit">
            </p>
        </form>
</body>

</html>