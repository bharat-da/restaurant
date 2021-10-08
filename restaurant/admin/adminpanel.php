<?php
session_start();
if (!isset($_SESSION['active'])) {
    header("location:../include/login.php");
} else {
    // require_once "../include/header.php";
    require_once "../include/navbar.php";
    require_once "../include/connect.php";
    $sql = "SELECT * from `items`";
    $result = mysqli_query($con, $sql);
    $fetch = mysqli_fetch_assoc($result);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
    </head>

    <body>
        <div class="background">
            <img src="../include/images/burger.png" width="100%" height="652px">
        </div>
        <div class="dropdown_items">
            <?php require_once "../include/sidebar.php"; ?>
        </div>
        <div id="btn">
            <?php if ($fetch['open'] == 1) { ?>
                <a href="../include/closeopen.php?id=<?php echo $fetch['open']; ?>" onclick="return  confirm('Do you want to close the Shop?')">
                    <input type="button" class="btn btn-danger" style="position: absolute; margin-top: -38.5%; margin-left: 9.8%;" value="Close The Shop"></a>
            <?php } else { ?>
                <a href="../include/closeopen.php?id=<?php echo $fetch['open']; ?>" onclick="return  confirm('Do you want to Open the shop?')"><input type="button" class="btn btn-primary" style="position: absolute; margin-top: -38.5%; margin-left: 9.8%;" value="Open the Shop"></a>
        <?php }
        } ?>
        </div>
    </body>

    </html>