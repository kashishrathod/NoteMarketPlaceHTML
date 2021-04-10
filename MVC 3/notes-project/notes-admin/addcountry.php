<?php include "admin_db.php";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
    while ($row = mysqli_fetch_assoc($query)) {
        $userid = $row['userid'];
    }
}

$name = " ";
$code = " ";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_country_get_value = mysqli_query($conn, "SELECT * FROM countries WHERE country_id=$id");
    while ($row = mysqli_fetch_assoc($query_country_get_value)) {
        $name = $row['country_name'];
        $code = $row['country_code'];
    }
    if (isset($_POST['country'])) {
        $country_name = $_POST['country_name'];
        $country_code = $_POST['country_code'];
        $update_country = mysqli_query($conn, "UPDATE countries SET country_name='$country_name', country_code='$country_code' WHERE country_id=$id");
    }
} else if (isset($_POST['country'])) {
    $country_name = $_POST['country_name'];
    $country_code = $_POST['country_code'];
    $query_country = mysqli_query($conn, "INSERT INTO countries(country_name, country_code, createddate, createdby, isactive)
    VALUES('$country_name', '$country_code', NOW(), $userid, 1)");
}
?>

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
    <?php include "nav-admin.php" ?>
    <div class="general-height">
        <form action="" method="POST">
            <section id="add-category">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Add Country</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category-name">Country Name<span class="required">*</span></label>
                                <input type="text" name="country_name" value="<?php echo $name ?>" class="form-control" id="category-name" placeholder="Enter your country name" required>
                            </div>
                            <div class="form-group">
                                <label for="category-name">Country Code<span class="required">*</span></label>
                                <input type="text" name="country_code" value="<?php echo $code ?>" class="form-control" id="category-name" placeholder="Enter country code" required>
                            </div>
                            <button type="submit" name="country" class="btn btn-primary category-btn">SUBMIT</button>

                        </div>
                        <div class="col-md-6"></div>
                    </div>

                </div>
            </section>
        </form>
    </div>
    <!--footer-->
    <?php include "footer-admin.php" ?>
    <!--footer end-->

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>