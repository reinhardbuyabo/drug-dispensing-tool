<?php
// include("connect.php"); // if you do not find it, give me a warning,

// Difference between include and require: require() // you have to find connect.php throw a fatal error and stop execution. also you can use include_once() or require_once()

require_once("connect.php");

$first_name = "Captain";
$last_name = "Meakins";
$email = "captain@example.com";
$phone = "0798345600";
$patient_id = 1237;

// values must be within single-quotation marks!!! Double quotation marks will take it as a string unlike the single quotation marks. double quotation marks will also include the dollar($) sign.

// $sql = "INSERT INTO patient (patient_id, first_name, last_name, email, phone) VALUES ('$patient_id', '$first_name', '$last_name', '$email', '$phone')";



// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

$sql = "INSERT INTO drug (generic_name, brand_name, dosage_form, route_of_administration, side_effects, expiry_date) 
        VALUES ('Paracetamol', 'Tylenol', 'Tablet', 'Oral', 'Nausea, allergic reactions, liver damage', '2024-05-17')";

echo ($sql . "<br>");

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
