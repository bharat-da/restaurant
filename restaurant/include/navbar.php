<?php
$curl = $_SERVER['REQUEST_URI'];
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
    <?php if ($role == 1) {  ?>
        <!-- Navigation Bar Admin -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../admin/adminpanel.php">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php if ($curl == "/restaurant/admin/customers.php") { ?>
                            <a class="nav-link active" aria-current="home" href="customers.php">Customers</a>
                        <?php } else { ?>
                            <a class="nav-link" href="../admin/customers.php">Customers</a>
                        <?php } ?>
                    </li>
                    <li class="nav-item">
                        <?php if ($curl == "/restaurant/admin/orders.php") { ?>
                            <a class="nav-link active" aria-current="home" href="../admin/orders.php">Orders</a>
                        <?php } else { ?>
                            <a class="nav-link" href="../admin/orders.php">Orders</a>
                        <?php } ?>
                    </li>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="../include/changepass.php">Change Password</a></li>
                            <li><a class="dropdown-item" href="../include/logout.php">Logout</a></li>
                        </ul>
                    </div>
            </div>
        </nav>
    <?php } else { ?>

        <!-- Navigation Bar for User -->
        <div id="navigation">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="../users/index.php">Yummy Tummy</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if ($curl == "/restaurant/users/viewitems.php") { ?>
                                <a class="nav-link active" aria-current="home" href="viewitems.php">Items</a>
                            <?php } else { ?>
                                <a class="nav-link" href="../users/viewitems.php">Items</a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($curl == "/restaurant/users/makeorder.php") { ?>
                                <a class="nav-link active" aria-current="home" href="../users/makeorder.php">Make an Order</a>
                            <?php } elseif (isset($_SESSION['active'])) { ?>
                                <a class="nav-link" href="../users/makeorder.php">Make an Order</a>
                            <?php } else { ?>
                                <a class="nav-link" href="../include/login.php">Make an Order</a>
                            <?php } ?>
                        </li>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php if (isset($_SESSION['active'])) { ?>
                                    <li><a class="dropdown-item" href="../include/editprofile.php">Edit Profile</a></li>
                                    <li><a class="dropdown-item" href="../include/logout.php">Logout</a></li>
                                    <li><a class="dropdown-item" href="../include/changepass.php">Change Password</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="../include/login.php">Login</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                </div>
            </nav>
        </div>
    <?php  } ?>
</body>

</html>