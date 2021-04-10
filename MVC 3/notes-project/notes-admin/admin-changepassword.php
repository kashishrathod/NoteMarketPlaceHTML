<?php include "admin_db.php";
session_start();

$old_pass = true;
$con_pass = true;
$pass_change = false;

if (isset($_SESSION['email'])) {
    $email_id = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email_id = '$email_id'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $password = $row['password'];
    }
    if (isset($_POST['submit'])) {
        $old_password = $_POST['o_pass'];
        $new_password = $_POST['n_pass'];
        $confirm_password = $_POST['con_pass'];

        if ($password != $old_password) {
            $old_pass = false;
        } else if ($new_password == $confirm_password) {
            $query1 = "UPDATE users SET password='$new_password' WHERE email_id = '$email_id'";
            $result1 = mysqli_query($conn, $query1);
            $pass_change = true;
        } else {
            $con_pass = false;
        }
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

</head>
<!--body-->

<body>

    <!--change password section-->
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-login-1">
                    <div id="logo" class="text-center logo-login">
                        <img src="img/login-img/top-logo.png">
                    </div>
                    <form class="white-bg" method="POST">
                        <h3 id="change-pass-page">Change Password</h3>
                        <p>Enter your new password to change your password</p>

                        <!--old password section-->
                        <div class="form-group">
                            <label for="opassword" class="pass">Old Password</label>
                            <div class="password">
                                <input type="password" name="o_pass" id="password-field" placeholder="Enter your old password" class="form-control" />
                                <img src="img/login-img/eye.png" class="toggle-password" toggle="#password-field">
                            </div>
                            <div class="correct-email">
                                <?php
                                if (!$old_pass) {
                                    echo "<b style='color:#6255a5;'><center>password not matched</center></b>";
                                }
                                ?>
                            </div>
                        </div>
                        <!--new password section-->
                        <div class="form-group">
                            <label for="npassword" class="pass">New Password</label>
                            <div class="password">
                                <input type="password" name="n_pass" id="password-field2" placeholder="Enter your new password" class="form-control" />
                                <img src="img/login-img/eye.png" class="toggle-password" toggle="#password-field2">
                            </div>
                        </div>
                        <!--confirm password section-->
                        <div class="form-group">
                            <label for="cpassword" class="pass">Confirm password</label>
                            <div class="password">
                                <input type="text" name="con_pass" id="password-field3" placeholder="Enter your confirm password" class="form-control" />
                                <img src="img/login-img/eye.png" class="toggle-password" toggle="#password-field3">
                            </div>
                            <div class="correct-email">
                                <?php
                                if (!$con_pass) {
                                    echo "<b style='color:#6255a5;'><center>new password and confirm password not matched!</center></b>";
                                }
                                ?>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-block btn-change">SUBMIT</button>
                        <?php
                        if ($pass_change) {
                            echo "<b style='color:#6255a5;'><center>password change successfully!</center></b>";
                            header('Location:login-admin.php');
                        }
                        ?>
                    </form>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-3 col-1"></div>
            </div>
        </div>
    </section>


    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>