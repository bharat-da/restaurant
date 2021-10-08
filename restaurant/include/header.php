<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <link rel="icon" href="../include/images/logo.png">
  <style>
    
    .table {
      width: 40%;
      background-color: none;
      color: white;
    }

    .table1 {
      width: 80%;
      background-color: #F5EEF8;
    }

    .carousel-inner {
      width: 1600px;
      max-width: 100%;
      max-height: 700px;
      /* top: 700px; */
    }

    .btns2 {
      margin: 0;
      position: absolute;
      top: 65%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .btns2 a{
      color: rgb(233,233,233);
      text-decoration:none;
      font-size: 1.5rem;
      margin:5px;
      padding: 5px 10px;
      background: rgba(255,255,255,0.055);
      position: relative;
      transition: all .4s;
    }
    .btns2 a:hover{
      box-shadow:0 10px 20px rgba(0, 0, 0, 0.24);
    }
    .btns2 a::before{
      content: '';
      position:absolute;
      bottom:0;
      left:0;
      height:0%;
      width:100%;
      background: #845ec2;
      z-index:-1;
      transition:all .4s;
    }
    .btns2 a:hover::before{
      height: 50%;
    }

    .loginform {
      margin: 0;
      position: absolute;
      top: 55%;
      left: 50%;
      text-align: center;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .sidebar_u {
      margin: 0;
      position: absolute;
      top: 8%;
      left: 90%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .indexlink {
      margin: 0;
      position: absolute;
      top: 8%;
      left: 10%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    #login {
      margin: 0;
      position: absolute;
      top: 110%;
      left: 50%;
      color: black;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .logo {
      position: absolute;
      top: -5%;
      left: 3%;
    }

    .center {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .container {
      margin: 0;
      position: fixed;
      top: 45%;
      left: 56.5%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    #container {
      margin: 0;
      position: fixed;
      text-align: center;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .items {
      margin: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    #makeorder {
      margin: 0;
      position: absolute;
      top: 105%;
      left: 50%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }

    .dropdown_items {
      margin: 0;
      position: absolute;
      top: 18%;
      left: 5%;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
    .additemform {
      margin: 0;
      position: absolute;
      top: 55%;
      left: 50%;
      text-align: center;
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
    }
  </style>
  <title>Document</title>
</head>

<body>

</body>

</html>