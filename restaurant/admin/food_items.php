<?php
session_start();

require_once "../include/header.php";
require_once "../include/navbar.php";

//when admin come after manipulating data
if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == "Burger") {
        $id = 1;
    } elseif ($_SESSION['type'] == "Burrito") {
        $id = 2;
    } elseif ($_SESSION['type'] == "Taco") {
        $id = 3;
    } else {
        $id = 4;
    }
}

//when comes from side bar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if ($id == 1) {
    $sql = "SELECT * FROM `items` WHERE `type`='Burger'";
} elseif ($id == 2) {
    $sql = "SELECT * FROM `items` WHERE `type`='Burrito'";
} elseif ($id == 3) {
    $sql = "SELECT * FROM `items` WHERE `type`='Taco'";
} else {
    $sql = "SELECT * FROM `items` WHERE `type`='Drink'";
}
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
                border: 2px solid black;
                padding: 10px;
                text-align: center;
            }

            .button2:hover {
                background-color: #4CAF50;
                color: white;
            }

            .button2 {
                background-color: green;
                color: white;
                border: 2px solid #4CAF50;
            }

            .button1:hover {
                background-color: #f44336;
                color: white;
            }

            h2 {
                color: whitesmoke;
            }
        </style>
        <title>Document</title>
    </head>

    <body>
        <div class="background">
            <img src="../include/images/burger.png" width="100%" height="652px">
        </div>
        <div class="dropdown_items">
            <?php require_once "../include/sidebar.php"; ?>
        </div>

        <div class="container">
            <?php
            if ($id == 1) { ?>
                <h2>Stock Of Burgers</h2><br>

            <?php   } elseif ($id == 2) { ?>
                <h2>Stock Of Burrito</h2><br>

            <?php   } elseif ($id == 3) { ?>
                <h2>Stock Of Taco</h2><br>

            <?php   } else { ?>
                <h2>Stock Of Drinks</h2><br>

            <?php   }
            ?>
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Stock</th>
                </tr>
                <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php echo $fetch['name'] . " " . $fetch['type']; ?>
                        </td>
                        <td><?php echo $fetch['price'] ?></td>
                        <td><?php if ($fetch['stock'] == 1) {
                                echo "Available";
                            ?>
                            <?php } else {
                                echo "Not Available";
                            ?>
                            <?php } ?>
                        </td>
                        <td>
                            <?php if ($fetch['stock'] == 1) { ?>
                                <a href="../include/availability.php?id=<?php echo $fetch['id']; ?>" onclick="return  confirm('Do you want to Stock Out?')">
                                    <input type="button" class="button2" value="&#9989;"></a>
                            <?php } else { ?>
                                <a href="../include/availability.php?id=<?php echo $fetch['id']; ?>" onclick="return  confirm('Do you want to Stock In?')"><input type="button" class="button1" value="&#10060;"></a>
                            <?php } ?>
                        </td>
                    </tr>
            <?php }
            } ?>
            </table>
        </div>
    </body>

    </html>