<?php
session_start();
require_once "header.php";
$id = $_GET['id'];
$sql = "SELECT * from `items` WHERE `id`='$id'";
$result = mysqli_query($con, $sql);
$fetch = mysqli_fetch_assoc($result);
$_SESSION['type'] = $fetch['type'];
$stock = $fetch['stock'];
if ($result) {
    if ($stock == 1) {
        $sql = "UPDATE `items` SET `stock`='0' WHERE `id`='$id'";
        $rs = mysqli_query($con, $sql);
        if ($rs) {
            header("location: ../admin/food_items.php");
        }
    } else {
        $sql = "UPDATE `items` SET `stock`='1' WHERE `id`='$id'";
        $rs = mysqli_query($con, $sql);
        if ($rs) {
            header("location: ../admin/food_items.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>