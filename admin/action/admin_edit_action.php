<?php
include('../../includes/config.php');
$adminmsg = array();
$admin_id = strip_tags($_POST['admin_id']);
$action = strip_tags($_GET['action']);

switch ($action) {
	case 'profile':
		$name = strip_tags($_POST['name']);
		$email = strip_tags($_POST['email']);

		$sql = mysqli_query($con, "UPDATE admin SET name = '$name', email = '$email' WHERE admin_id = '$admin_id'");
		if ($sql) {
			$adminmsg = array("success" => true, "message" => "Edited successfully");
		} else {
			$adminmsg = array("success" => false, "message" => "Oops! Something went wrong. Please try again later.");
		}
		break;

	case 'password':
		$password = strip_tags($_POST['password']);


		$sql = mysqli_query($con, "UPDATE admin SET password = '$password' WHERE admin_id = '$admin_id'");
		if ($sql) {
			$adminmsg = array("success" => true, "message" => "Password edited successfully");
		} else {
			$adminmsg = array("success" => false, "message" => "Oops! Something went wrong. Please try again later.");
		}
		break;

	default:
		echo "Error ";
		break;
}
echo json_encode($adminmsg);
