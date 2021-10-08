<?php
session_start();
require_once "../include/header.php";
require_once "../include/navbar.php";

$sql = "SELECT * FROM `items`";
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
        <!-- background -->
        <div class="background">
            <img src="../include/images/taco.jpg" width="100%" height="630px">

        </div>
        <form action="../include/cart.php" method="post">
            <div class="items">
                <table>
                    <tr>
                        <th>Name&emsp;</th>
                        <th>Price&emsp;</th>
                    </tr>
                    <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?php echo $fetch['name'] . " " . $fetch['type']; ?>
                            </td>
                            <td><?php echo $fetch['price'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </form>
        </div>
        <div id="footer">
            <?php include "../include/footer.php" ?>
        </div>
    </body>

    </html>