<?php
session_start();

require_once "../include/header.php";
require_once "../include/navbar.php";

$sql = "SELECT * FROM `users` WHERE `role`='0'";
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
      table{
        
        border: 2px solid black;
        overflow-y:scroll;
        height:400px;
        width:800px;
        display:block;
        padding: 10px;
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
        color: white;
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
    <div class="container col-7">

      <h2>My Customers</h2><br>
      <table class="table1">
        <tr>
          <th>Name&emsp;</th>
          <th>Email Id&emsp;</th>
          <th>Mobile&emsp;</th>
          <th>Address&emsp;</th>
        </tr>
        <?php while ($fetch = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td>
              <?php echo $fetch['name']; ?>
            </td>
            <td><?php echo $fetch['email']; ?></td>
            <td><?php echo $fetch['mobile']; ?></td>
            <td><?php echo $fetch['address']; ?></td>
          </tr>
      <?php }
      } ?>
      </table>
    </div>
  </body>

  </html>