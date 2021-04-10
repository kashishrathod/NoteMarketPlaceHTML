<?php 
include "db_connection.php";
session_start();

$_SESSION['login'] = true;


?>

<html>
<!--head-->

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!--title-->
    <title>Notes Marketplace</title>
     <!--favicon-->
    <link rel="shortcut icon" href="img/home/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
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
                        <img src="img/pre-login/top-logo.png">
                    </div>
                    <form action="login.php" method="POST" class="white-bg">
                        <h3 id="login-page">Login</h3>
                        <p>Enter your email address and password to login</p>

                        <div class="form-group">
                            <label for="email">Email</label>
                            
                            <?php
                            if(isset($_COOKIE['email'])){
                                $email1 = $_COOKIE['email'];
                                echo "<input type='email' name='email' class='form-control' id='email' value=' $email1' aria-describedby='emailHelp' placeholder='Enter email' required>";

                            }
                            else{
                                echo "<input type='email' name='email' class='form-control' id='email' aria-describedby='emailHelp' placeholder='Enter email' required>";


                            }
                            
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="password" class="pass">Password</label>
                            <label class="fp"><a href="forgotpass.php">Forgot Password?</a></label>
                            <div class="password">
                            
                            <img src="img/pre-login/eye.png" class="toggle-password" toggle="#password-field">
                            </div>
                            <?php
                            if(isset($_COOKIE['password'])){
                                $pass1 = $_COOKIE['password'];
                                echo "<input id='password-field' type='password' name='password' value='$pass1' placeholder='Password' class='form-control'/>";

                            }
                            else{
                                echo "<input id='password-field' type='password' name='password' placeholder='Password' class='form-control'/>";


                            }
                            
                            ?>


                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="remember" id="check">&nbsp;
                            <label class="form-check-label login-check" for="check">Remember Me</label>
                        </div>

                        <button type="submit" name="login" class="btn btn-block sign-btn">LOGIN</button>
                        <div class="alreadySign">
                            Don't have an account?
                            <a href="signup.php">Sign Up</a>
                        </div>
                        <?php
                        
                        if(isset($_POST['login'])){

                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            
                            $email = mysqli_real_escape_string($conn, $email);
                            $password = mysqli_real_escape_string($conn, $password);
                            
                            $query = "select * from users where email_id='$email' and password='$password' and role_id=1 and isemailverified=1 and isactive=1";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['userid'];
                            }
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $count = mysqli_num_rows($result);
                            
                            
                            if($count == 1){
                                $_SESSION['email'] = $email;
                                $_SESSION['userid'] = $userid;
                                if(isset($_POST['remember'])){
                                    setcookie('email', $email, time()+60*60*24*7);
                                    setcookie('password', $password, time()+60*60*24*7);
                                }
                                $query_redirect = mysqli_query($conn, "SELECT * FROM user_profile WHERE user_id=$id");
                                $count_redirect = mysqli_num_rows($query_redirect);
                                if($count_redirect > 0){
                                    header('Location: searchnote.php');
                                 }
                                else {
                                    header('Location: userprofile.php');   
                                }
                            }
                            else{
                                echo "<b style='color:#6255a5;'><center>LOGIN FAILED!</center></b>";
                            }
                        
                        
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