<?php
include('includes/config.php');
//print_r($_POST);
if (isset($_POST["login"]) && $_POST["login"] == "Login") {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $sel_a = "SELECT * FROM `admin` WHERE  `email`='" . $email . "' AND `password` = '" . $password . "'";
    $qry_a = mysqli_query($con, $sel_a);
    $row_a = mysqli_fetch_assoc($qry_a);
    $count = mysqli_num_rows($qry_a);
    if ($count > 0) {
        $_SESSION['admin_id'] = $row_a["admin_id"];
        header("location:admin/home.php");
        // echo $_SESSION['admin_id'];
    } else {
        $_SESSION['login_errmsg'] = "Email & Password Not Match";
        //echo "not";
        header("location:index.php");
    }
} else {
    echo "error";
}
