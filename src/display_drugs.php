<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispense Drugs</title>
</head>

<body>
    <form action="process_dispense_drugs.php" method="post">
        <label for="pname">Patient Name</label>
        <input type="text" name="patien_name" id="pname">

        <select name="drugs" id="">
            <option value="Panadol">Panadol</option>
            <option value="Paracetamol">Paracetamol</option>
            <option value="Piriton">Piriton</option>
        </select>

        <textarea name="more_drug_info" id="" cols="30" rows="10"></textarea>
    </form>
</body>

</html>