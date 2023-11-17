<?php
// echo var_dump($_FILES);
// exit;
include('../../includes/config.php');
require_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$adminmsg = array();

// Allowed mime types 
$excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/wps-office.xlsx');

// Validate whether selected file is a Excel file 
if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $excelMimes)) {

    // If the file is uploaded 
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheet_arr = $worksheet->toArray();

        // Remove header row 
        unset($worksheet_arr[0]);

        foreach ($worksheet_arr as $row) {
            $phone_number = $row[0];
            $name = $row[1];
            $loanNo = $row[2];

            // Insert member data in the database 
            mysqli_query($con, "INSERT INTO data_dump (phone_number, name, loan_no) VALUES ('" . $phone_number . "', '" . $name . "', '" . $loanNo . "')");
        }

        $adminmsg = array("success" => true, "message" => "Uploaded successfully");
    } else {
        $adminmsg = array("success" => false, "message" => "Oops! Something went wrong. while reading file.");
    }
} else {
    $adminmsg = array("success" => false, "message" => "Oops! invalid file.");
}

echo json_encode($adminmsg);
