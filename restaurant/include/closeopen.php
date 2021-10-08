<?php
session_start();
require_once "header.php";

//to close or open receiving orders from customers
$id = $_GET['id'];
if ($id == 1) {
        $sql = "UPDATE `items` SET `open`='0'";
        $rs = mysqli_query($con, $sql);
        if ($rs) {
            header("location: ../admin/adminpanel.php");
        }
    } else {
        $sql = "UPDATE `items` SET `open`='1'";
        $rs = mysqli_query($con, $sql);
        if ($rs) {
            header("location: ../admin/adminpanel.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
</head>

<body>

</body>

</html>