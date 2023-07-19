<?php
if (isset($_POST['submit'])) {
    // $con = mysqli_connect('localhost', 'root', '', 'drug_dispensing_tool');
    require_once 'connect.php';


    if ($_GET['edit'] == 'user') {
        $user_type = $_POST['user_type'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];


        // database insert SQL code
        $sql = "UPDATE " . $user_type . " SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone ='$phone', username ='$username', password = '$password' WHERE " . $user_type . "_id=" . $id;

        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            echo "Records Edited Successfully";

            if ($user_type == 'doctor') {
                header('location: display_doctors.php');
            } else if ($user_type == 'patient') {
                header('location: display_users.php');
            } else if ($user_type == 'pharmacist') {
                header('location: display_pharmacists.php');
            }

            // var_dump($_SESSION);
        }
    } else if ($_GET['edit'] == 'drug') {

        $sql = "UPDATE drug SET generic_name = '" . $_POST['generic_name'] . "', brand_name = '" . $_POST['brand_name'] . "', dosage_form = '" . $_POST['dosage_form'] . "', route_of_administration = '" . $_POST['route_of_administration'] . "', side_effects = '" . $_POST['side_effects'] . "', expiry_date = '" . $_POST['expiry_date'] . "' WHERE drug_id = " . $_POST['drug_id'];

        $rs = mysqli_query($conn, $sql);
        if ($rs) {
            echo "Records Edited Successfully";

            header('Location: display_drugs.php');
        }
    }
} else {
    echo "Something Went Wrong!";
}
