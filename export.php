<?php

// Include Database connection
include("dbConfig.php");
// Include SimpleXLSXGen library
include("SimpleXLSXGen.php");

$employees = [
  ['Id', 'First Name', 'Last Name', 'Position', 'Email Address', 'Phone Number', 'Location']
];

$id = 0;
$sql = "SELECT * FROM employees";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
  foreach ($res as $row) {
    $id++;
    $employees = array_merge($employees, array(array($id, $row['first_name'], $row['last_name'], $row['position'], $row['email_address'], $row['phone_number'], $row['location'])));
  }
}

$xlsx = SimpleXLSXGen::fromArray($employees);
$xlsx->downloadAs('employees.xlsx'); // This will download the file to your local system

// $xlsx->saveAs('employees.xlsx'); // This will save the file to your server

echo "<pre>";
print_r($employees);
