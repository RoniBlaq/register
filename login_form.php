
<?php
@include 'code.php';

session_start();

if(isset($_POST['submit'])){

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = md5($_POST['password']);
$user_type = $_POST['user_type'];

$select ="SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
$result = mysqli_query($conn, $select);

if(mysqli_num_rows($result) > 0){
   
    $row = mysqli_fetch_array($result);

    if($row['user_type'] == 'admin'){
        $_SESSION['admin_name'] = $row['name'];
        header('location:admin_page.php');

    }elseif($row['user_type'] == 'user'){
        $_SESSION['user_name'] = $row['name'];
        header('location:user_page.php');
    }
}else{
    $error[] = 'incorrect email or password!';
}

};
?>



<!DOCTYPE html>
<html class="html-welcome html-welcome-index mobile-device" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
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
    .form-btn{
        background:rgb(161, 145, 131);
         color:#ff7200;
         text-transform:capitalize;
         font-size:20px;
         cursor:pointer;
    }
    .form-btn:hover{
        background:#ff7200;
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
        <h3 class="fs-4 text-uppercase mb-5 text-black">login now</h3>

        <?php 
        if(isset($error)){
            foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
            };
        };
        ?>

        <input type="text" name="email" requiered placeholder="enter your email">
        <input type="password" name="password" requiered placeholder="enter your password">
        <input type="submit" name="submit" value="login now" class="form-btn">
        <p class="fs-5 mt-5 text-black" >don't have an account? <a href="register_form.php">register now</a></p>
    </form>
</div>    
</body>
</html>