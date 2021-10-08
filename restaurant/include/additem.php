<?php  
session_start();

require_once "../include/header.php";
require_once "../include/navbar.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];

    if(($name == "") || ($type == "") || ($price == "")){
        echo'<script>alert("Empty Fields");</script>';
    }else{
        $sql = "INSERT INTO `items`(`name`,`type`,`price`,`stock`,`open`) VALUES('$name','$type','$price','1','1')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo'<script>alert("Item Added");</script>';
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
    <div class="background">
        <img src="../include/images/burger.png" width="100%" height="652px">
    </div>
    <div class="dropdown_items">
        <?php require_once "../include/sidebar.php"; ?>
    </div>
<div class="additemform">
<form action="" method="post" class="form-control" autocomplete="off">
            <br><h2>Add Item</h2>
            <br><input type="text" class="form-control" name="name" id="name"  oninvalid="alert('Enter name of New Food Item');" placeholder="Enter Name of the Food Item" maxlength="20" required>
            <br><select name="type" id="type" oninvalid="alert('Enter Category');" placeholder="Enter Category" class="form-control" required>
            <option value="">Choose Category</option>
            <option value="Burger">Burger</option>
            <option value="Burrito">Burrito</option>
            <option value="Taco">Taco</option>
            <option value="Drink">Drink</option>
            <option value="Other">Other</option>
            </select>
            <br><input type="tel" class="form-control" name="price" id="price" oninvalid="alert('Enter Valid Price Range');"placeholder="Price" maxlength="4"required>
            <input type="submit" value="Add Item" id="submit" name="submit" class="btn btn-primary mb-3"><br></div>
</form>
</div>
</body>
</html>