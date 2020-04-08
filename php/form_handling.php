<!DOCTYPE html>
<html>
<head>
    <title>Registration details</title>
    <meta charset="utf-8">
    <meta lang="EN">
    <link rel="stylesheet" type="text/css" href="form_handling.css">
    <!-- Add icon library for download button-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
global $file;
$file = 'registration.txt';
// Open the file to get existing content
$current = file_get_contents($file); //when using this function we don't need to close the file
// Append a new person to the file
$registration_entries = [$_POST["name"],  $_POST["age"], $_POST["email"], $_POST["phone"]];
$registration_text = "";
foreach ($registration_entries as $value) {
    $registration_text .= $value . "\t";
}
// Write the contents back to the file
file_put_contents($file, $registration_text . "; \n", FILE_APPEND);
global $display_array;
$display_array = explode("\t", $registration_text);
$registered_user = [
    "Name" => $display_array[0],
    "Age" => $display_array[1],
    "Email" => $display_array[2],
    "Phone" => $display_array[3],
];

?>

<div id="container">
    <h2>Thank you for your registration</h2>
    <p>Here is the information you have submitted:</p>
    <ol>
        <?php
        foreach ($registered_user as $key => $value) {
            echo "<li> " . $key . " - " . $value . " </li>";
        }
        ?>
    </ol>
    <button class="back-btn"><a href="../main.html" class="navigate">Back</a</button>

</div>
</body>
</html>