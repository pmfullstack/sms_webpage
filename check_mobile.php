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
        include 'congratulation_page.php';
    } else {
        // Mobile number not found
        echo '<div class="card text-center mt-3">
                <div class="card-header">
                    Not Found
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mobile Number Not Found</h5>
                    <p class="card-text">Your custom content for a not found number goes here.</p>
                </div>
                <div class="card-footer text-muted">
                    Footer content for a not found number.
                </div>
            </div>';
    }
}
