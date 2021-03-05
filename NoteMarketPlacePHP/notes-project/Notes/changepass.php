<html>
<!--head-->

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
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

    <!--change password section-->
    <section id="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-login-1">
                    <div id="logo" class="text-center logo-login">
                        <img src="img/pre-login/top-logo.png">
                    </div>
                    <form class="white-bg">
                        <h3 id="change-pass-page">Change Password</h3>
                        <p>Enter your new password to change your password</p>

                        <!--old password section-->
                        <div class="form-group">
                            <label for="opassword" class="pass">Old Password</label>
                            <div class="password">
                            <input type="password" id="password-field" placeholder="Enter your old password" class="form-control"/>
                            <img src="img/pre-login/eye.png" class="toggle-password" toggle="#password-field">
                            </div>
                        </div>
                        <!--new password section-->
                        <div class="form-group">
                            <label for="npassword" class="pass">New Password</label>
                            <div class="password">
                            <input type="password" id="password-field2" placeholder="Enter your new password" class="form-control"/>
                            <img src="img/pre-login/eye.png" class="toggle-password" toggle="#password-field2">
                            </div>
                        </div>
                        <!--confirm password section-->
                        <div class="form-group">
                            <label for="cpassword" class="pass">Confirm password</label>
                            <div class="password">
                            <input type="text" id="password-field3" placeholder="Enter your confirm password" class="form-control"/>
                            <img src="img/pre-login/eye.png" class="toggle-password" toggle="#password-field3">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-change">SUBMIT</button>
                        
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
    
    <!----script js------->
    <script src="js/script.js"></script>

</body>

</html>