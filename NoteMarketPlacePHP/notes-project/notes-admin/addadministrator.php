<html>

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
    <!--title-->
    <title>Notes Marketplace</title>
    <!--favicon-->
    <link rel="shortcut icon" href="img/login-img/favicon.ico">
    <!--font awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <?php include "nav-admin.php" ?>

    <div class="general-height">
        <section id="addadministrator">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3>Add Administrator</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="fname">First Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="fname" placeholder="Enter your first name" required>
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name<span class="required">*</span></label>
                            <input type="text" class="form-control" id="lname" placeholder="Enter your last name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-4 col-5 form-group">
                                <label for="phoneno">Phone No.</label>
                                <select id="phoneno" class="form-control arrow-down">
                                    <option selected>+91</option>
                                    <option>+66</option>
                                    <option>+77</option>
                                    <option>+88</option>
                                </select>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-7 form-group">
                                <div class="form-group phonenumber">
                                    <label for="phone"><br></label>
                                    <input type="tel" class="form-control" id="phone" placeholder="phone no.">
                                </div>
                            </div>
                        </div>

                        <button class="btn addadministrator-btn">SUBMIT</button>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </section>
    </div>

    <!--footer-->
    
    <?php include "footer-admin.php"?>
    <!--footer end-->


    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>