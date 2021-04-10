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
$des = " ";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $type_get_value = mysqli_query($conn, "SELECT type_name, type_description FROM note_type WHERE type_id=$id");
    while ($row = mysqli_fetch_assoc($type_get_value)) {
        $name = $row['type_name'];
        $des = $row['type_description'];
    }
    if (isset($_POST['type'])) {
        $type_name = $_POST['type_name'];
        $description = $_POST['description'];
        $update_type = mysqli_query($conn, "UPDATE note_type SET
        type_name='$type_name', type_description='$description' WHERE type_id=$id");
        header("Refresh:0;");
    }
} else if (isset($_POST['type'])) {
    $type_name = $_POST['type_name'];
    $description = $_POST['description'];
    $query_type = mysqli_query($conn, "INSERT INTO note_type(type_name, type_description, createddate, createdby, isactive)
    VALUES('$type_name', '$description', NOW(), $userid, 1)");
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
    <?php include "nav-admin.php " ?>
    <div class="general-height">
        <form action="" method="POST">
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
                                <input type="text" name="type_name" value="<?php echo $name ?>" class="form-control" id="category-name" placeholder="Enter your category" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description<span class="required">*</span></label><br>
                                <textarea id="description" name="description" name="description" rows="4" cols="65" placeholder="Enter your description"><?php echo $des ?></textarea>
                            </div>
                            <button type="submit" name="type" class="btn btn-primary category-btn">SUBMIT</button>

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