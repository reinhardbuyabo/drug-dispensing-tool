<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Drug</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <fieldset>
            <legend>
                Add Drug Here
            </legend>

            <p>
                <label for="generic_name">Generic Name</label>
                <input type="text" name="generic_name" id="generic_name">
            </p>
            <p>
                <label for="brand_name">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name">
            </p>
            <p>
                <label for="dosage_form">Dosage Form</label>
                <input type="text" name="dosage_form" id="dosage_form">
            </p>
            <p>
                <label for="route_of_administration">Route of Adminstration</label>
                <input type="text" name="route_of_administration" id="route_of_administration">
            </p>
            <p>
                <label for="side_effects">Side Effects</label>
                <input type="text" name="side_effects" id="side_effects">
            </p>
            <p>
                <label for="Expiry Date">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date">
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
        </fieldset>

    </form>
    <?php
    include("connect.php"); // if you do not find it, give me a warning,

    // Difference between include and require: require() // you have to find connect.php throw a fatal error and stop execution. also you can use include_once() or require_once()

    require_once("connect.php");

    // values must be within single-quotation marks!!! Double quotation marks will take it as a string unlike the single quotation marks. double quotation marks will also include the dollar($) sign.

    // $sql = "INSERT INTO patient (patient_id, first_name, last_name, email, phone) VALUES ('$patient_id', '$first_name', '$last_name', '$email', '$phone')";


    // // connect.php
    // if (mysqli_query($conn, $sql)) {
    //     echo "New record created successfully";
    // } else {
    //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    $generic_name = $_POST['generic_name'];
    $brand_name = $_POST['brand_name'];
    $dosage_form = $_POST['dosage_form'];
    $route_of_administration = $_POST['route_of_administration'];
    $side_effects = $_POST['side_effects'];
    $expiry_date = $_POST['expiry_date'];

    $sql = "INSERT INTO drug (generic_name, brand_name, dosage_form, route_of_administration, side_effects, expiry_date) 
        VALUES ('$generic_name', '$brand_name', '$dosage_form', '$route_of_administration', '$side_effects', '$expiry_date')";

    echo ($sql . "<br>");

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);
    ?>
</body>

</html>