<?php
include('includes/config.php');
$sql = "DELETE FROM data_dump WHERE created_at < DATE_SUB(CURDATE(), INTERVAL 15 DAY)";
mysqli_query($con, $sql);
