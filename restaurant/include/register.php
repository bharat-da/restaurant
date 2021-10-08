<?php
session_start();
require_once "../include/header.php";
require_once "../include/navbar.php";
if (isset($_POST['submit'])) {
    $answer1 = $_SESSION['answer'];
    $userans = $_POST['capcha'];
    if ($answer1 != $userans) {
        echo '<script>alert("Wrong Capcha");</script>';
    } else {
        //register_data to database
        $name = $_POST['name'];
        $password = $_POST['pwd'];
        $email = $_POST['email'];
        $mobile = $_POST['mob'];
        $address = $_POST['address'];
        $role = "0";
        // if email already exist ..
        if (($name == "") || ($password == "") || ($email == "") || ($mobile == "") || ($address == "")) {
            echo '<script>alert("Empty Fields");</script>';
        } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
            echo $errorMsg = "<span style='color:red';> error : Enter a valid Email Address </span>";
        } else if (!preg_match("/^[6-9][0-9]{9}$/", $mobile)) {
            echo $errorMsg = "<span style='color:red';> error : Enter a valid Mobile Number </span>";
        } else{
            $exist = "SELECT * FROM `users` WHERE `email` = '$email'";
            $existrs = mysqli_query($con, $exist);
            $num = mysqli_num_rows($existrs);
            if ($num > 0) {
                echo '<script>alert("Already registered");</script>';
            } else {
                $sql = "INSERT INTO `users`(`name`,`email`,`password`,`mobile`,`address`,`role`) VALUES('$name','$email','$password','$mobile','$address','$role')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo '<script>alert("register successfully");</script>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <script src="../include/main.js"></script>
</head>

<body>
    <div id="container">

        <form class="form-control" action="" method="POST" id="form1" autocomplete="off">
            <br>
            <h2>Register for quick order</h2>
            <br><input type="text" name="name" id="name" class="form-control" oninvalid="alert('You must enter your full name');" placeholder="Enter your Full Name" maxlength="30">
            <h5 id="namecheck" class="valid"></h5>
            <br><input type="password" name="pwd" id="pwd" class="form-control" placeholder="Create Password" maxlength="25">
            <h5 id="passcheck" class="valid"></h5>
            <br><input type="text" name="email" id="email" class="form-control" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Example@gmail.com" maxlength="50">
            <h5 id="emailcheck" class="valid"></h5>
            <br>
            <div class="mb-0 row">&emsp;<select name="code" id="code" class="col-sm-3">
                    <option value="+91">+91</option>
                </select>
                <div class="col-sm-8">
                    <input type="tel" name="mob" id="mob" class="form-control" placeholder="Enter your Mobile Number" pattern="[6-9][0-9]{9}" maxlength="10">
                </div>
            </div>
            <h5 id="mobcheck" class="valid"></h5>
            <br><textarea name="address" id="address" class="form-control" cols="30" rows="3" placeholder="Enter your Address with landmark" maxlength="200"></textarea>
            <h5 id="addcheck" class="valid"></h5>
            <br>
            <div class="mb-3 row">&emsp;&emsp;&emsp;<img src="../include/capcha.php" class="col-sm-3 col-form-label">
                <div class="col-sm-5"><input type="tel" name="capcha" id="capcha" placeholder="Capcha" class="form-control" maxlength="2" size="4"></div>
            </div>
            <input type="submit" value="register" name="submit" id="submit" class="btn btn-primary mb-3">
        </form>
    </div>
    <div id="footer">
    </div>
</body>