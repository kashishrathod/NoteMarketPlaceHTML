<?php include "admin_db.php";

$firstname = " ";
$lastname = " ";
$email_id = " ";
$phone_no = " ";
if (isset($_GET['editid'])) {
    $editid = $_GET['editid'];

    $query_get_value = mysqli_query($conn, "SELECT users.firstname, users.lastname,
    users.email_id, user_profile.phone_no, user_profile.phone_code FROM users LEFT JOIN
    user_profile ON users.userid=user_profile.user_id
    WHERE userid=$editid");
    while ($row = mysqli_fetch_assoc($query_get_value)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email_id = $row['email_id'];
        $phone_no = $row['phone_no'];
        $phone_code_1 = $row['phone_code'];
    }
    if (isset($_POST['admin'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $phone_code = $_POST['phone_code'];
        $phone_number = $_POST['phone_number'];

        $update_admin_profile = mysqli_query($conn, "UPDATE users SET firstname='$fname', lastname='$lname',
        email_id='$email' WHERE userid=$editid");
        
        $update_userprofile = mysqli_query($conn, "UPDATE user_profile SET phone_no='$phone_number', phone_code='$phone_code' WHERE user_id=$editid");
        header("Refresh:0;");
    }
} else if (isset($_POST['admin'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_code = $_POST['phone_code'];
    $phone_number = $_POST['phone_number'];

    $query_user = mysqli_query($conn, "INSERT INTO users(role_id, firstname, lastname, email_id, password,
    isemailverified, createdby, isactive) VALUES(2, '$fname', '$lname', '$email', 'admin123', 1, 2, 1)");
    
    $user_id = mysqli_insert_id($conn);

    $query_phone = mysqli_query($conn, "INSERT INTO user_profile(user_id, phone_code, phone_no)
    VALUES($user_id, $phone_code, '$phone_number')");
    header('Location:manageadministrator.php');
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
                                <input type="text" name="fname" value="<?php echo $firstname ?>" class="form-control" id="fname" placeholder="Enter your first name" required>
                            </div>

                            <div class="form-group">
                                <label for="lname">Last Name<span class="required">*</span></label>
                                <input type="text" name="lname" value="<?php echo $lastname ?>" class="form-control" id="lname" placeholder="Enter your last name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email<span class="required">*</span></label>
                                <input type="email" name="email" value="<?php echo $email_id ?>" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-5 form-group">
                                    <label for="phoneno">Phone No.</label>
                                    <select id="phoneno" name="phone_code" class="form-control arrow-down">
                                        <?php
                                        if (isset($_GET['editid'])) {
                                            $query_country = mysqli_query($conn, "SELECT * FROM countries");
                                            while ($row = mysqli_fetch_assoc($query_country)) {
                                                $country_code = $row['country_code'];
                                                $country_id = $row['country_id'];
                                                if ($phone_code_1 == $country_id) {
                                                    echo "<option value='$country_id' selected='selected'>$country_code</option>";
                                                } else {
                                                    echo "<option value='$country_id'>$country_code</option>";
                                                }
                                            }
                                        } else {
                                            $query_country = mysqli_query($conn, "SELECT * FROM countries");     
                                            while ($row = mysqli_fetch_assoc($query_country)) {
                                                $country_code = $row['country_code'];
                                                $country_id = $row['country_id'];
                                                echo "<option value='$country_id'>$country_code</option>";
                                            }
                                        }


                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-7 form-group">
                                    <div class="form-group phonenumber">
                                        <label for="phone"><br></label>
                                        <input type="tel" name="phone_number" value="<?php echo $phone_no ?>" class="form-control" id="phone" placeholder="phone no.">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" name="admin" class="btn addadministrator-btn">SUBMIT</button>
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