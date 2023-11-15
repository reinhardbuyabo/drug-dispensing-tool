<?php
include("connect.php"); // if you do not find it, give me a warning,

// Difference between include and require: require() // you have to find connect.php throw a fatal error and stop execution. also you can use include_once() or require_once()

// Process form data including the image upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $generic_name = $_POST["generic_name"];
    $brand_name = $_POST["brand_name"];
    $dosage_form = $_POST["dosage_form"];
    $route_of_administration = $_POST["route_of_administration"];
    $side_effects = $_POST["side_effects"];
    $expiry_date = $_POST["expiry_date"];

    // Handle image upload
    $target_dir = "../uploads/"; // Create a folder to store uploaded images
    $target_file = $target_dir . basename($_FILES["drug_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["drug_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["drug_image"]["tmp_name"], $target_file)) {
            // Insert data and image file path into the database
            $sql = "INSERT INTO drug (generic_name, brand_name, dosage_form, route_of_administration, side_effects, expiry_date, image_path) 
                    VALUES ('$generic_name', '$brand_name', '$dosage_form', '$route_of_administration', '$side_effects', '$expiry_date', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "Record added successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading the image.";
        }
    }

    $conn->close();
}
