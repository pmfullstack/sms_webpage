<?php
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
            color: #28a745;
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
        <img src="img/check.gif" alt="Congratulation Badge" class="congratulation-badge">
        <p class="congratulation-message">Congratulations! <span class="text-capitalize text-dark"><strong><?php echo $row['name']; ?></strong></span></p>
    </div>
    <div class="content-div">
        <p>Your loan has been approved for a minimum of $ <strong>1500</strong> and a maximum of <strong>$5,000</strong>. Your Loan Account Number is <strong>TX-<?php echo $row['loan_no']; ?></strong>.</p>
        <p>Also, we have mentioned below the monthly installment plan as per your approved loan amount. You can choose any one of the following as per your convenience. </p>
        <div class="list-group mb-3">
            <a href="#" class="list-group-item list-group-item-action" style="color: #000000">For <strong>$ 1000</strong>, Total Pay back <strong>$ 1080</strong>, Monthly Instalment <strong>$ 90 </strong>for <strong>12 Months</strong></a>
            <a href="#" class="list-group-item list-group-item-action" style="color: #000000">For <strong>$ 2000</strong>, Total Pay back <strong>$ 2400</strong>, Monthly Instalment <strong>$ 100</strong> for <strong>24 Months</strong></a>
            <a href="#" class="list-group-item list-group-item-action" style="color: #000000">For <strong>$ 3000</strong>, Total Pay back <strong>$ 3600</strong>, Monthly Instalment <strong>$ 100</strong> for <strong>36 Months</strong></a>
            <a href="#" class="list-group-item list-group-item-action" style="color: #000000">For <strong>$ 5000</strong>, Total Pay back <strong>$ 6300</strong>, Monthly Instalment <strong>$ 175</strong> for <strong>36 Months</strong></a>
        </div>
        <p>Furthermore, we would like to share that once the loan is transferred into your account, the first monthly installment will be due within the first 30 days, on the date you will give the authorization for.</p>
        <p>Kindly connect with us on our number <a href="tel:<?php echo $convertedPhoneNumber ?>"><?php echo $row1['phone_number'] ?></a> or email us at <a href="mailto:loans@cashnowlenders.com">loans@cashnowlenders.com</a> , so that we can start with the required formalities. We look forward to hearing from you!</p>
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