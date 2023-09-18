<?php include '../inc/header.php'; ?>

<div class="wrapper">

    <form id="register" class="input-group" method="POST" action="form.php">
        <h1>Register Here</h1>

        <div class="input-field">
            <input placeholder="First Name" type="text" id="first_name" name="first_name" required>
            <i class="fa-regular fa-user"></i>
        </div>

        <div class="input-field">
            <input placeholder="Last Name" type="text" id="last_name" name="last_name" required>
            <i class="fa-regular fa-user"></i>

        </div>
        <div class="input-field">
            <input placeholder="Email" type="text" id="email" name="email" required>
            <i class="fa-regular fa-envelope"></i>
        </div>
        <div class="input-field">
            <input placeholder="Phone Number" type="text" id="phone" name="phone" required>
            <i class="fa-solid fa-phone-flip"></i>
        </div>
        <div class="input-field">
            <input placeholder="ID" type="text" id="patient_id" name="id" required>
            <i class="fa-solid fa-hashtag"></i>
        </div>
        <div class="input-field">
            <input placeholder="Username" type="text" id="username" name="username" required>
            <i class="fa-solid fa-user"></i>
        </div>

        <div class="input-field">
            <input placeholder="Password" type="password" id="password" name="password" required>
            <i class="fa-solid fa-lock"></i>
        </div>

        <?php
        if (isset($_GET['user_type'])) {
            echo '<input type="text" name="user_type" id="user_type" value="' . $_GET['user_type'] . '" hidden>';
        }
        ?>

        <input onclick="showToast('User Successfully Registered')" class="submit-btn" type="submit" name="submit" id="submit" value="Register">

        <div class="register-link">
            <p>Already have an account? <a href="./login.php?user_type=<?php echo $_GET['user_type']; ?>">Login</a></p>
        </div>

    </form>
</div>

<div id="toastBox">

</div>

<script>
    let toast = document.getElementById('toastBox');
    let successMsg = 'Successfully registered!';
    let errorMsg = 'Error encountered';
    let invalid = 'Invalid Input';

    function showToast(msg) {
        let toast = document.createElement('div');
        toast.classList.add('toast');
        toast.innerHTML = msg;
        toastBox.appendChild(toast);
    }

    setTimeout(() => {
        toast.remove()
    }, 3000);
</script>
<?php include '../inc/footer.php'; ?>