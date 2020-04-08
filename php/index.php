<!DOCTYPE html>
<html>
<head>
    <title>Registration form</title>
    <meta charset="utf-8">
    <meta lang="EN">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
// define variables and set to empty values
$name = $email = $phone = $age ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $phone = test_input($_POST["phone"]);
    $age = test_input($_POST["age"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<h1>Registration form</h1>
<div id="container">
    <form method="POST" action="form_handling.php">
        <p>Use the following form to register</p>
        <input type="text" name="name" placeholder="name" required>
        <label class="radio-container">Mr
            <input type="radio" checked="checked" name="salutation" value="Mr">
            <span class="checkmark"></span>
        </label>
        <label class="radio-container">Mrs
            <input type="radio" name="salutation" value="Mrs">
            <span class="checkmark"></span>
        </label>
        <label class="radio-container">Ms
            <input type="radio" name="salutation" value="Ms">
            <span class="checkmark"></span>
        </label>
        <br />
        <label for="age">Select your age</label>
        <select class="select-css" name="age" required>
            <?php
            for ($i = 18; $i < 100; $i++) {
                echo("<option>" . $i . "</option>");
            }
            ?>
        </select>
        <input type="email" name="email" id="email" placeholder="Enter a valid email address" autocomplete="on" required>
        <input type="tel"  name="phone" placeholder="Add your phone number" x-autocompletetype="tel" pattern="(^\+[0-9]{2,3}|^\+[0-9]{2}\(0\)|^\(\+[0-9]{2}\)\(0\)|^00[0-9]{2}|^0)([0-9]{9}$|[0-9\-\s]{10}$)">
        </select>
        <input type="Submit" class="btn" value="Submit">
    </form>
</div>

</body>
</html>