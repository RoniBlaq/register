<?php
@include 'code.php';

if(isset($_POST['submit'])){
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);
$user_type = $_POST['user_type'];

$select ="SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
    $error[] = 'user already exist!';
}else{
    if($pass != $cpass){
        $error[] = 'password not matched!';
    }else{
        $insert = "INSERT INTO user_form(name,email, password, user_type) VALUES('$name','$email', '$pass', '$user_type')";
        mysqli_query($conn, $insert);
        header('location:login_form.php');
    }
}

};
?>


<!DOCTYPE html>
<html class="html-welcome html-welcome-index mobile-device" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
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
      .form-container{
        padding:2em;
        padding-bottom:6em;
        min-height:100vh;
        background:#eee;
      }
      form{
        padding:2em;
        border-radius:5px;
        box-shadow: 0 5px 10px rgba(0,0,0,.1);
        background:#fff;
        text-align:center;
        width:500px;
      }
      input, select{
        width:100%;
        padding:1em 1.4em;
        font-size:0.9em;
        margin:8px 0;
        background:#eee;
        border-radius:5px;
      }
      option{
        background:#fff;
      }
    .form-btn{
        background:rgb(161, 145, 131);
         color:#ff7200;
         text-transform:capitalize;
         font-size:20px;
         cursor:pointer;
    }
    .form-btn:hover{
        background: #ff7200;
        color: #fff;
    }
    a{
        color:#ff7200;
    }
    .error-msg{
        margin:10px 0;
        display:block;
        background:#ff7200;
        color:#fff;
        border-radius:5px;
        font-size:0.8em;
        padding:0.8em;
    }
    </style>
</head>
<body>
<div class="form-container d-flex align-items-center justify-content-center">
    <form action="" method="post">
        <h3 class="fs-4 text-uppercase mb-5 text-black">register now</h3>
        <?php 
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>
        <input type="text" name="name" requiered placeholder="enter your name">
        <input type="text" name="email" requiered placeholder="enter your email">
        <input type="password" name="password" requiered placeholder="enter your password">
        <input type="password" name="cpassword" requiered placeholder="confirm your password">
        <select name="user_type">
            <option value="user">user</option>
            <option value="admin">admin</option>
        </select>
        <input type="submit" name="submit" value="register now" class="form-btn">
        <p class="fs-5 mt-5 text-black" >already have an account? <a href="login_form.php">login now</a></p>
    </form>
</div>    
</body>
</html>