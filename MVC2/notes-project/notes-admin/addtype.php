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
</head>

<body>
<?php include "nav-admin.php "?>
    <div class="general-height">
        <section id="add-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Add Type</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category-name">Type<span class="required">*</span></label>
                            <input type="text" class="form-control" id="category-name" placeholder="Enter your category" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description<span class="required">*</span></label><br>
                            <textarea id="description" name="description" rows="4" cols="65" placeholder="Enter your description"></textarea>
                        </div>
                        <button class="btn btn-primary category-btn">SUBMIT</button>

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