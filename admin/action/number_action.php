<?php
include('../../includes/config.php');

$adminmsg = array();

$qry_a = mysqli_query($con, "SELECT * FROM `number`");
$row_a = mysqli_fetch_assoc($qry_a);
$count = mysqli_num_rows($qry_a);

if ($count > 0) {
    mysqli_query($con, "UPDATE number SET phone_number = '" . $_POST['number'] . "' WHERE 1");
    $adminmsg = array("success" => true, "message" => "Updated successfully");
} else {
    mysqli_query($con, "INSERT INTO number (phone_number) VALUES ('" . $_POST['number'] . "')");
    $adminmsg = array("success" => true, "message" => "Inserted successfully");
}

echo json_encode($adminmsg);
