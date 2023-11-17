<?php
include('includes/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobileNumber = $_POST["mobileNumber"];

    // Perform a query to check if the mobile number exists in the database
    $sql = mysqli_query($con, "SELECT * FROM data_dump WHERE phone_number = '$mobileNumber' ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_assoc($sql);
    $count = mysqli_num_rows($sql);

    if ($count > 0) {
        // Mobile number found
        include 'congratulation.php';
    } else {
        include 'not_found.php';
    }
}
