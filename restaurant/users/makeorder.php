<?php
session_start();
require_once "../include/header.php";
require_once "../include/navbar.php";

if (!isset($_SESSION['active'])) {
    header("location:../include/login.php");
}
if (isset($_POST['submit'])) {
    if (!empty($_POST['item'])) {
        $food_items = array();
        $price = 0;
        foreach ($_POST['item'] as $foodid) {
            $sql = "SELECT * FROM `items` WHERE `id`='$foodid'";
            $result = mysqli_query($con, $sql);
            $fetch = mysqli_fetch_assoc($result);
            $food_items[] = $fetch['name'] . " " . $fetch['type'];
            $price = $price + $fetch['price'];
        }
            $email = $_SESSION['email'];
            $password = $_SESSION['pass'];
            //User Details
            $details = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
            $result2 = mysqli_query($con, $details);
            $fetch2 = mysqli_fetch_assoc($result2);

            $name = $fetch2['name'];
            $mobile = $fetch2['mobile'];
            $address = $fetch2['address'];
            $cus_id = $fetch2['id'];
            $food = implode(",", $food_items);
            $order_time = date("d-M h:i a");

            //Query for inserting order into database
            $order = "INSERT INTO `orders`(`cus_name`,`cus_mobile`,`cus_order`,`order_time`,`cus_address`,`amount`,`cus_id`)VALUES('$name','$mobile','$food','$order_time','$address','$price','$cus_id')";
            $rs = mysqli_query($con, $order);
            if($rs) {
                echo '<script>alert("Order Placed");</script>';
            }
        
    }
}

$sql = "SELECT * FROM `items` where `stock`='1'";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table,
            th,
            td {
                border: 1px solid black;
                text-align: center;
            }
            .background {
                opacity: 0.3;
            }
        </style>
        <title>Document</title>
    </head>

    <body>
        <div class="background">
            <img src="../include/images/taco.jpg" width="100%" height="630px">
        </div>
        <form action="" method="post">
            <div class="items">
                <table>
                    <tr>
                        <th>Name&emsp;</th>
                        <th>Price&emsp;</th>
                        <th>Add to Cart&emsp;</th>
                    </tr>
                    <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?php echo $fetch['name'] . " " . $fetch['type']; ?>
                            </td>
                            <td><?php echo $fetch['price'] ?></td>
                            <td><input type="checkbox" name="item[]" value="<?php echo $fetch['id']; ?>"></td>
                        </tr>
                <?php } ?>
                </table>
             
                <br><input type="submit" value="Make Order" name="submit" id="makeorder" onclick="return  confirm('Do you want to make an order?')">
                <?php  ?>
                <?php } ?>
        </form>
        </div>
        <div id="footer">
            <?php include "../include/footer.php" ?>
        </div>
    </body>

    </html>