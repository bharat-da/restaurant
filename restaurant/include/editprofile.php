<?php
session_start();
require_once "../include/header.php";
require_once "../include/navbar.php";

if (!isset($_SESSION['active'])) {
    header("location:../include/login.php");
}
$id = $_SESSION['id'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['pwd'];
    $email = $_POST['email'];
    $mobile = $_POST['mob'];
    $address = $_POST['address'];
    
    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`mobile`='$mobile',`address`='$address' WHERE `id`='$id '";
    $result = mysqli_query($con,$sql);
    if($result){
        
    }}
    $sql = "SELECT * FROM `users` WHERE `id`='$id'";
    $query = mysqli_query($con,$sql);
    $rs = mysqli_fetch_assoc($query);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="container">

<form class="form-control" action="" method="POST" id="form1" autocomplete="off">
    <br>
    <h2>Edit Profile</h2>
    <br><input type="text" name="name" id="name" class="form-control" value="<?php echo $rs['name']?>" oninvalid="alert('You must enter your full name');" placeholder="Enter your Full Name" maxlength="30">
    <h5 id="namecheck" class="valid"></h5>
    <br><input type="password" name="pwd" id="pwd" class="form-control" value="<?php echo $rs['password']?>" placeholder="Create Password" maxlength="25">
    <h5 id="passcheck" class="valid"></h5>
    <br><input type="text" name="email" id="email" class="form-control" value="<?php echo $rs['email']?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Example@gmail.com" maxlength="50">
    <h5 id="emailcheck" class="valid"></h5>
    <br>
    <div class="mb-0 row">&emsp;<select name="code" id="code" class="col-sm-3">
            <option value="+91">+91</option>
        </select>
        <div class="col-sm-8">
            <input type="tel" name="mob" id="mob" class="form-control" value="<?php echo $rs['mobile']?>" placeholder="Enter your Mobile Number" pattern="[6-9][0-9]{9}" maxlength="10">
        </div>
    </div>
    <h5 id="mobcheck" class="valid"></h5>
    <br><textarea name="address" id="address" class="form-control" cols="30" rows="3" placeholder="Enter your Address with landmark" maxlength="200"><?php echo $rs['address']?></textarea>
    <h5 id="addcheck" class="valid"></h5>
    <br>
    
    <input type="submit" value="Update" name="submit" id="submit" class="btn btn-primary mb-3">
</form>
</div>
<div id="footer">
<?php include "../include/footer.php" ?>
</div>
</body>
</html>
