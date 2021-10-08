<?php
session_start();
require_once "../include/header.php";

if (!isset($_SESSION['active'])) {
    header("location:../include/login.php");
} else {
    $role = $_SESSION['role'];
    if ($role == 1) {
        require_once "../include/navbar.php";
    } else {
        require_once "../include/navbar.php";
    }
    if (isset($_POST['submit'])) {
        $pass = $_SESSION['pass'];
        $email = $_SESSION['email'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $cpass = $_POST['cnewpass'];
        
        if(($oldpass=="")||($newpass=="")||($cpass=="")){
            echo '<script>alert("Empty Fields");</script>';
        }else{

        if ($pass == $oldpass) {
            if ($newpass == $cpass) {
                $sql = "UPDATE `users` SET `password`='$newpass' WHERE `email`='$email'";
                $result = mysqli_query($con, $sql);
                if ($result == 1) {
                    $_SESSION['pass'] = $newpass;
                    echo '<script>alert("Password successfully Changed");</script>';
                }
            } else {
                echo '<script>alert("Both New Password and Confirm Password must be same");</script>';
            }
        } else {
            echo '<script>alert("Old password is not matched");</script>';
        }
    }}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Change Password</title>
</head>

<body>
    <div class="background">
        <img src="../include/images/taco.jpg" width="100%" height="630px">
    </div>
    <div id="container">

        <form action="" method="post" id="form1" class="form-control">
            <br>
            <h2>Change Password</h2><br><br>
            <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Old Password" maxlength="25"><br>
            <input type="password" name="newpass" id="newpass" class="form-control" placeholder="New Password" maxlength="25"><br>
            <input type="password" name="cnewpass" id="cnewpass" class="form-control" placeholder="Confirm New Password" maxlength="25">
            <h5 id="passcheck"></h5><br>
            <input type="submit" name="submit" id="submit" value="Change Password" class="btn btn-primary"><br><br>
        </form>
    </div>
    <div id="footer">
        <?php
        include "../include/footer.php";
        ?>
    </div>
    <script>
        $(document).ready(function() {
            $('#submit').on('click', function() {
                var valid = true,
                    errorMessage = "";

                if (($('#oldpass').val() == '') || ($('#newpass').val() == '') || ($('#cnewpass').val() == '')) {
                    errorMessage = "Empty Field \n";
                    valid = false;
                }
                if (!valid && errorMessage.length > 0) {
                    alert(errorMessage);
                }
            })
            $("#cnewpass").keyup(function() {
                var newpass = $("#newpass").val();
                var pass = newpass.replace(/ /g, '');
                var cnewpass = $("#cnewpass").val();
                var cpass = cnewpass.replace(/ /g, '');
                if (pass !== cpass) {
                    $("#passcheck").show();
                    $("#passcheck").html("Password Doesn't match");
                    $("#passcheck").focus();
                    $("#passcheck").css("color", "red");
                } else {
                    $("#passcheck").hide();

                }
            })
        });
    </script>
</body>

</html>