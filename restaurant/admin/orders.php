<?php
session_start();

require_once "../include/header.php";
require_once "../include/navbar.php";

$sql = "SELECT * FROM `orders` ORDER BY `id` DESC";
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      table{
        border: 2px solid black;
        overflow-y:scroll;
        /* height:400px; */
        display:block;
        padding: 10px;
        text-align: center;
      }
      th,
      td {
        border: 2px solid black;
        padding: 10px;
        text-align: center;
      }

      .background {
        opacity: 0.8;
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
      <table class="table-secondary">
        <h2>Orders</h2><br>
        <tr>
          <th>Order&emsp;</th>
          <th>Order Time&emsp;</th>
          <th>Name&emsp;</th>
          <th>Mobile&emsp;</th>
          <th>Address&emsp;</th>
          <th>Amount&emsp;</th>
        </tr>
        <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td>
              <?php echo $fetch['cus_order']; ?>
            </td>
            <td><?php echo $fetch['order_time']; ?></td>
            <td><?php echo $fetch['cus_name']; ?></td>
            <td><?php echo $fetch['cus_mobile']; ?></td>
            <td><?php echo $fetch['cus_address']; ?></td>
            <td><b><?php echo "₹ " . $fetch['amount']; ?></b></td>
          </tr>
      <?php }
      } ?>
      </table>
    </div>
  </body>

  </html>