<?php include('includes/config.php');
$sql = mysqli_query($con, "SELECT * FROM number ORDER BY id DESC LIMIT 1");
$row1 = mysqli_fetch_assoc($sql);
// Remove non-numeric characters from the original phone number
$numericPhoneNumber = preg_replace("/[^0-9]/", "", $row1['phone_number']);

// Add the country code prefix
$convertedPhoneNumber = "+1" . $numericPhoneNumber;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations!</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
            color: #000000;
        }

        .congratulation-container {
            text-align: center;
            margin-top: 20px;
        }

        .congratulation-badge {
            width: 80px;
        }

        .congratulation-message {
            font-size: 24px;
            color: red;
            margin-top: 10px;
        }

        .footer {
            margin-top: 50px;
            color: #6c757d;
        }

        .blog-header-logo {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
            font-size: 2rem;
            font-weight: bold;
        }

        .content-div {
            margin: 0 15px 0 15px;
            text-align: justify;
        }
    </style>
</head>

<body>

    <p class="blog-header-logo text-white text-center bg-secondary py-3" href="#">CASHNOW LENDERS</p>
    <div class="congratulation-container">
        <img src="img/not-found.gif" alt="Congratulation Badge" class="congratulation-badge">
        <p class="congratulation-message">NOT FOUND!</p>
    </div>
    <div class="content-div">
        <p>The Resource Could Not Be Found.</p>
        <p>IF You Feel You Have Received The Approval Message Before 10 Business Days And Not Able To Locate Your Application Please CALL US ON <a href="tel:<?php echo $convertedPhoneNumber ?>"><?php echo $row1['phone_number'] ?></a>.</p>
        <p>According To The Privacy Act of 1974, as amended, 5 U.S.C. § 552a . We Are Advised Not To Store Data For More Than 15 Days.
            Please Call Us For Assistance At <a href="tel:<?php echo $convertedPhoneNumber ?>"><?php echo $row1['phone_number'] ?></a>.</p>
        <p>We Would Love To Help You With Your Application Status.</p>
        <p class="text-center">CASHNOW LENDERS</p>
    </div>

    <footer class="sticky-footer bg-secondary text-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <B>CashNow Lenders. 2023</B></span>
            </div>
        </div>
    </footer>

</body>

</html>