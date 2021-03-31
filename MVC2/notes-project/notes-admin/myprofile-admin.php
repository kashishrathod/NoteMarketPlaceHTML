<html>

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


<body>
<?php include "nav-admin.php"?>

    <div class="general-height">
        <section id="myprofile">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4>My Profile</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
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
                        <div class="form-group">
                            <label for="email">Secondary Email</label>
                            <input type="semail" class="form-control" id="semail" aria-describedby="emailHelp" placeholder="Enter your email address">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="phoneno">Phone No.</label>
                                <select id="phoneno" class="form-control arrow-down">
                                    <option selected>+91</option>
                                    <option>+44</option>
                                    <option>+66</option>
                                    <option>+88</option>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group phonenumber">
                                    <label for="phone"><br></label>
                                    <input type="tel" class="form-control" id="phone" placeholder="Enter your Phone Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <div class="displaypicture">
                                <label for="file-input">
                                    <img src="img/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" type="file">
                            </div>
                        </div>
                        <div class="row btn-height">
                            <button class="btn btn-primary color-btn">SUBMIT</button>
                        </div>
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