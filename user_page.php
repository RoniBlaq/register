<?php
@include 'code.php';

session_start();

if(!isset($_SESSION['user_name'])){
  header('location:login_form.php');
}
 ?>
<!DOCTYPE html>
<html class="html-welcome html-welcome-index mobile-device" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link
			rel="stylesheet"
			href="https://dv4xo43u9eo19.cloudfront.net/assets/application-c5fc315500a87c15c358e798ec25a8f30cd2c595b062944fcfb86021c3779816.css"
			media="all"
		/>
        <style>
      *{
        font-family:'poppins', sans-serif;
        margin:0;
        padding:0;
        box-sizing:border-box;
        outline:none;
        border:none;
        text-decoration:none;
      }
      .btn{
        padding:0.6em 1.6em;
        border-radius:5%;
        display:inline-block;
        background:black;
        color:white;
        margin:0 0.4em;
      }
     .btn:hover{
        background:#ff7200;
      }
      .container{
        padding:2em;
        padding-bottom:6em;
        min-height:100vh;
      }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center">
      <div class="content text-align-center">
<h3 class="fs-3 text-black" >hi, <span style="background:#ff7200; color:#fff; border-radius:5px; padding:0 15px;">user</span></h3>
<h1 class="fs-1 text-black" >welcome <span style="color:#ff7200;"><?php echo $_SESSION['user_name'] ?></span></h1>
<p class="fs-2 mb-2">this is a user page</p>
<p class="fs-2 mb-2">thanks for taking your time for me (Roni appreciate &#x1f600;)</p>
<a href="login_form.php" class="btn">Login</a>
<a href="register_form.php" class="btn">register</a>
<a href="logout.php" class="btn">logout</a>
</div>
</div>
</body>
</html>

