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
<?php include "nav-admin.php"?>

    <div class="general-height">
        <section id="manage-system-config">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3>Manage System Configuration</h3>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                    <div class="form-group">
                        <label for="email">Support emails address<span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Support phone number<span class="required">*</span></label>
                        <input type="tel" class="form-control" id="phone" placeholder="enter phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Emails Address(es) (for various events system will send notifications to these userd)<span class="required">*</span></label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook URL</label>
                        <input type="text" class="form-control" id="facebook" placeholder="Enter facebook url">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter URL</label>
                        <input type="text" class="form-control" id="twitter" placeholder="Enter twitter url">
                    </div>
                    <div class="form-group">
                        <label for="linkedin">Linkedin URL</label>
                        <input type="text" class="form-control" id="linkedin" placeholder="Enter linkedin url">
                    </div>

                    <div class="form-group">
                        <label>Default image for notes(If seller do not upload)</label>
                        <div class="displaypicture">
                            <label for="file-input">
                                <img src="img/myprofile/upload-file.png">
                            </label>
                            <input id="file-input" type="file">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Default profile picture(If seller do not upload)</label>
                        <div class="displaypicture">
                            <label for="file-input">
                                <img src="img/myprofile/upload-file.png">
                            </label>
                            <input id="file-input" type="file">
                        </div>
                    </div>
                    <div class="row btn-height">
                        <button class="btn btn-primary system-btn">SUBMIT</button>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-0 col-0"></div>

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