<?php
session_start(); //to ensure you are using same session
unset($_SESSION['admin_id']);
header("location:index.php");
