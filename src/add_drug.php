<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Drug</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body>
    <div class="wrapper">
        <h1>Add Drug Here</h1>
        <form method="post" action="added_drug.php">
            <p class="input-field">
                <label for="generic_name">Generic Name</label>
                <input type="text" name="generic_name" id="generic_name">
            </p>
            <p class="input-field">
                <label for="brand_name">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name">
            </p>
            <p class="input-field">
                <label for="dosage_form">Dosage </label>
                <input type="text" name="dosage_form" id="dosage_form">
            </p>
            <p class="input-field">
                <label for="route_of_administration">Route of Administration</label>
                <input type="text" name="route_of_administration" id="route_of_administration">
            </p>
            <p class="input-field">
                <label for="side_effects">Side Effects</label>
                <input type="text" name="side_effects" id="side_effects">
            </p>
            <p class="input-field">
                <label for="expiry_date">Expiry Date</label>
                <input type="date" name="expiry_date" id="expiry_date">
            </p>
            <p>
                <input class="submit-btn" type="submit" value="Submit">
            </p>
        </form>
    </div>
    <?php
    // PHP code goes here
    ?>
</body>

</html>