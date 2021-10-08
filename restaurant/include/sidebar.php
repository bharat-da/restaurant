<?php
require_once "header.php";
$curl = $_SERVER['REQUEST_URI']; //to get current url 
$role = 0;
if (isset($_SESSION['active'])) {
  $role = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    #navbarDarkDropdownMenuLink {
      color: white;
    }
  </style>
  <title>Document</title>
</head>

<body>
  <!-- Admin sidebar -->
  <?php if ($role == 1) {  ?>
    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Items
      </a>

      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="../admin/food_items.php?id=1">Burger</a></li>
        <li><a class="dropdown-item" href="../admin/food_items.php?id=2">Burrito</a></li>
        <li><a class="dropdown-item" href="../admin/food_items.php?id=3">Taco</a></li>
        <li><a class="dropdown-item" href="../admin/food_items.php?id=4">Drinks</a></li>
        <li><a class="dropdown-item" href="../include/additem.php">+ Add More...</a></li>
      </ul>
    </div>
  <?php } else { ?>

    <!-- User sidebar -->
    <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> More </a>
    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
      <?php if ($curl == "/restaurant/include/login.php") { ?>
        <li><a class="dropdown-item" href="../include/login.php">Login</a></li>
        <li><a class="dropdown-item" href="../include/register.php">Register</a></li>
      <?php } else { ?>
        <li><a class="dropdown-item" href="../include/login.php">Login</a></li>
        <li><a class="dropdown-item" href="../include/register.php">Register</a></li>
      <?php } ?>
    </ul>
  <?php  } ?>

</body>

</html>