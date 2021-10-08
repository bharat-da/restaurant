<?php
require_once "../include/header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    #footer {
      margin-left: 50%;
      margin-top: 10%;
      text-align: center;
      top: 95%;
      left: 50%;
      z-index: -1;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
  </style>
  <title>Document</title>
</head>

<body>
  <!-- background image -->
  <div class="background">
    <img src="../include/images/burger.png" width="100%" height="100%">
  </div>

  <!-- sidebar -->
  <div class="sidebar_u">
    <?php
    require_once "../include/sidebar.php";
    ?>
  </div>

  <div class="btns2">
    <a href="../users/viewitems.php">View Items</a>
    <?php if (isset($_SESSION['active'])) { ?>
      <a href="../users/makeorder.php">Make an Order</a>
    <?php } else { ?>
      <a href="../include/login.php">Make an Order</a>
    <?php } ?>
  </div>
  <div class="logo">
    <img src="../include/images/logo1.png" width="40%" height="20%">
  </div>
  <div id="footer">
    <?php include "../include/footer.php" ?>
  </div>
</body>

</html>