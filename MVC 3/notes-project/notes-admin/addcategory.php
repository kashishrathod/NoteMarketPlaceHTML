<?php include "admin_db.php";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
    while ($row = mysqli_fetch_assoc($query)) {
        $userid = $row['userid'];
    }
}

$category_name = " ";
$category_description = " ";

if(isset($_GET['categoryid'])){
    $categoryid = $_GET['categoryid'];
    $query_get_category_data = mysqli_query($conn, "SELECT * FROM note_categories WHERE note_categories_id=$categoryid");
    while($row = mysqli_fetch_assoc($query_get_category_data)){
        $category_name = $row['category_name'];
        $category_description = $row['category_description'];
    }
    if(isset($_POST['category'])){
        $category_name_1 = $_POST['categoty_name'];
        $description = $_POST['description'];
        $update_category = mysqli_query($conn, "UPDATE note_categories SET
        category_name='$category_name_1', category_description='$description' WHERE note_categories_id=$categoryid");
        header("Refresh:0;");
    }
    
}
else if (isset($_POST['category'])) {
    $category_name = $_POST['categoty_name'];
    $description = $_POST['description'];
    $query_category = mysqli_query($conn, "INSERT INTO note_categories(category_name, category_description, createddate, createdby, isactive)
    VALUES('$category_name', '$description', NOW(), $userid, 1)");
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
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <?php include "nav-admin.php" ?>

    <div class="general-height">
        <form action="" method="POST">
            <section id="add-category">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h3>Add Category</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="category-name">Category Name<span class="required">*</span></label>
                                <input type="text" name="categoty_name" value="<?php echo $category_name ?>" class="form-control" id="category-name" placeholder="Enter your category" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description<span class="required">*</span></label><br>
                                <textarea id="description" name="description" rows="4" cols="65" placeholder="Enter your description"><?php echo $category_description ?></textarea>
                            </div>
                            <button type="submit" name="category" class="btn btn-primary category-btn">SUBMIT</button>

                        </div>
                        <div class="col-lg-6 col-md-6"></div>
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