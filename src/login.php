<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <script src="https://kit.fontawesome.com/9e862feeff.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <form id="login" class="input-group" action="login_process.php" method="POST">
            <h1>Login</h1>
            <!-- <label for="username">Username:</label> -->
            <div class="input-field">
                <input placeholder="Username" type="text" id="username" name="username" required>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-field">
                <input placeholder="Password" type="password" id="password" name="password" required>
                <i class="fa-solid fa-lock"></i>
            </div>
            <!-- <label for="password">Password:</label> -->

            <?php
            if (isset($_GET['user_type'])) {
                echo '<input type="text" name="user_type" id="user_type" value="' . $_GET['user_type'] . '" hidden>';
            }
            ?>


            <div class="remember-forgot">
                <label for="remember-forgot">
                    <input type="checkbox" name="remember-forgot" id="remember-forgot">Remember Me
                </label>
                <a href="patient_form.html">Forgot Password?</a>
            </div>
            <input class="submit-btn" type="submit" value="Login">

            <div class="register-link">
                <p>Don't have an account? <a href="./patient_form.html">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>