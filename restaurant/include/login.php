<?php
session_start();
require_once "../include/header.php";

//if he is already logged in
if (isset($_SESSION['active'])) {
    $email = $_SESSION['email'];
    $password = $_SESSION['pass'];
    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
    $result = mysqli_query($con, $sql);
    $fetch = mysqli_fetch_assoc($result);
    $role = $fetch['role'];
    if ($role == 1) {
        header("location:../admin/adminpanel.php");
    } else {
        header("location:../users/makeorder.php");
    }
} else {

//if he is logging in after logout
    if (isset($_POST['submit'])) {
        $answer1 = $_SESSION['answer'];
        $userans = $_POST['capcha'];
        if ($answer1 == $userans) {

            $email = $_POST['email'];
            $password = $_POST['pass'];

            if (($email == "") || ($password == "")) {
                echo '<script>alert("Empty Fields");</script>';
            } elseif (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
                echo $errorMsg = "<span style='color:red';> error : Enter a valid Email Address </span>";
            } else {

                $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
                $result = mysqli_query($con, $sql);
                $num = mysqli_num_rows($result);
                $fetch = mysqli_fetch_assoc($result);
                $role = $fetch['role'];
                $id = $fetch['id'];

                if ($num > 0) {
                    if ($role == 1) {
                        $_SESSION['active'] = "true";
                        $_SESSION['email'] = $email;
                        $_SESSION['pass'] = $password;
                        $_SESSION['role'] = $role;
                        setcookie("email", $email, time() + (86400 * 30), "/");
                        setcookie("pass", $password, time() + (86400 * 30), "/");
                        header("location:../admin/adminpanel.php");
                    } else {
                        $_SESSION['active'] = "true";
                        $_SESSION['email'] = $email;
                        $_SESSION['role'] = $role;
                        $_SESSION['id'] = $id;
                        $_SESSION['pass'] = $password;
                        setcookie("email", $email, time() + (86400 * 30), "/");
                        setcookie("pass", $password, time() + (86400 * 30), "/");
                        header("location:../users/makeorder.php");
                    }
                } else {
                    echo '<script>alert("Invalid Credentials");</script>';
                }
            }
        } else {
            echo '<script>alert("Wrong Capcha");</script>';
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
    <style>
        #indexlink {
            color: black;
        }

        #login {
            color: white;
        }
    </style>
    <script src="../include/main.js"></script>
</head>

<body>
    <div class="background">
        <img src="images/burrito.jpg" width="100%" height="100%">

        <div class="sidebar_u">
            <?php
            require_once "sidebar.php";
            ?>
        </div>
        <div class="indexlink">
            <a id="indexlink" href="../users/index.php">Home</a>
        </div>
        <div class="loginform">
            <form action="" method="post" id="form1" class="form-control">
                <br>
                <h2>Login</h2>
                <br><input type="email" class="form-control" name="email" id="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" oninvalid="alert('Enter Valid Email Address');" placeholder="Example@gmail.com" maxlength="50" value="<?php if (isset($_COOKIE['email'])) {
                                                                                                                                                                                                                                    echo $_COOKIE['email'];
                                                                                                                                                                                                                                } ?>" required>
                <h5 id="emailcheck" class="valid"></h5>
                <br><input type="password" class="form-control" name="pass" id="pwd" oninvalid="alert('Enter your Password');" placeholder="Enter your Password" maxlength="25" value="<?php if (isset($_COOKIE['pass'])) {
                                                                                                                                                                                            echo $_COOKIE['pass'];
                                                                                                                                                                                        } ?>" required>
                <h5 id="passcheck" class="valid"></h5>
                <br>
                <div class="mb-3 row">&emsp;&emsp;&emsp;<img src="../include/capcha.php" class="col-sm-3 col-form-label">
                    <div class="col-sm-5"><input type="tel" name="capcha" id="capcha" placeholder="Capcha" class="form-control" maxlength="2" size="4"></div>
                </div>
                <input type="submit" value="Login" id="submit" name="submit" class="btn btn-primary mb-3"><br>
            </form>
        </div>
    </div>
    <div id="footer">
        <?php include "../include/footer.php" ?>
    </div>
</body>

</html>