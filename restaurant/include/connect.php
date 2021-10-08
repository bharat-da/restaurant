<?php
$server = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "restaurant";

$con = mysqli_connect($server, $dbusername, $dbpassword, $dbname);
if(!$con){
    echo "Error in connecting with database";
}
