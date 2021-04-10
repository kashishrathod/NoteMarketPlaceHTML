<?php
include "admin_db.php";
session_start();

$failed_to_login = true;
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "select * from users where email_id='$email' and password='$password' and (role_id=2 or role_id=3)  and isactive=1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['email'] = $email;
        if (isset($_POST['remember'])) {
            setcookie('email', $email, time() + 60 * 60 * 24 * 7);
            setcookie('password', $password, time() + 60 * 60 * 24 * 7);
        }
        header('Location: dashboard.php');
    } else {
        $failed_to_login = false;
    }
}
?>

<html>
<!--head-->

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
    <!--title-->
    <title>Notes Marketplace</title>
    <!--favicon-->
    <link rel="shortcut icon" href="img/login-img/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<!--body-->

<body>

    <!--login section-->
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-login-1">
                    <div id="logo" class="text-center logo-login">
                        <img src="img/login-img/top-logo.png">
                    </div>
                    <form action="" method="POST" class="white-bg">
                        <h3 id="login-page">Login</h3>
                        <p>Enter your email address and password to login</p>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <?php 
                            if(isset($_COOKIE['email'])){
                                $email1 = $_COOKIE['email'];
                               echo "<input type='email' name='email' value='$email1' class='form-control' id='email' aria-describedby='emailHelp' placeholder='Enter email' required>";
                            }
                            else{
                                echo "<input type='email' name='email' class='form-control' id='email' aria-describedby='emailHelp' placeholder='Enter email' required>";
                            }
                            
                            ?>
                            
                        </div>

                        <div class="form-group">
                            <label for="password" class="pass">Password</label>
                            <label style="transform: translateX(220px);"><a href="forgotpass-admin.php" style="color: #6255a5; text-decoration: none;">Forgot Password?</a></label>
                            <div class="password">
                            <?php 
                            if(isset($_COOKIE['password'])){
                                $pass1 = $_COOKIE['password'];
                                echo "<input id='password-field' name='password' value='$pass1' type='password' placeholder='Password' class='form-control' />";
                            }
                            else{
                                echo "<input id='password-field' name='password' type='password' placeholder='Password' class='form-control' />";
                            }
                            
                            ?>
                                
                                <img src="img/login-img/eye.png" style="transform: translateY(-28px);" class="toggle-password" toggle="#password-field">
                            </div>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="check" name="remember">&nbsp;
                            <label class="form-check-label login-check" for="check">Remember Me</label>
                        </div>

                        <button type="submit" name="login" class="btn btn-block sign-btn">LOGIN</button>
                        <?php
                        
                        if($failed_to_login == false){
                            echo "<b style='color:#6255a5;'><center>LOGIN FAILED!</center></b>";
                        }
                        
                        ?>
                    </form>

                </div>
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
            </div>
        </div>
    </section>

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>