<?php include "admin_db.php";
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
    while ($row = mysqli_fetch_assoc($query)) {
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email_id = $row['email_id'];
        $userid = $row['userid'];
    }
    if (isset($_POST['profile'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $semail = $_POST['semail'];
        $phone_code = $_POST['phone_code'];
        $phone_no = $_POST['phone_no'];
        $query_user_update = mysqli_query($conn, "UPDATE users SET firstname='$fname', lastname='$lname' WHERE userid=$userid");


        $files = $_FILES['profile_pic'];

            $filename = $files['name'];
            $filetmp = $files['tmp_name'];


            $extention = explode('.', $filename);
            $filecheck = strtolower(end($extention));

            $fileextstored = array('jpg', 'png', 'jpeg');;

            if (in_array($filecheck, $fileextstored)) {
                if (!is_dir('../Member/')) {
                    mkdir('../Member/');
                }

                if (!is_dir('../Member/' . $userid)) {
                    mkdir('../Member/' . $userid);
                }

                
                $destinationfile = '../Member/' . $userid . "profile-pic-" . time() . '.' . $filecheck;
                move_uploaded_file($filetmp, $destinationfile); 
                
            }
        $query_profile_update = mysqli_query($conn, "UPDATE user_profile SET secondary_email='$semail', phone_code=$phone_code, phone_no='$phone_no', profile_picture='$destinationfile' WHERE user_id=$userid");
    }
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
        <form action="" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="fname" value="<?php echo $firstname ?>" id="fname" placeholder="Enter your first name" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name<span class="required">*</span></label>
                                <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $lastname ?>" placeholder="Enter your last name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email<span class="required">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?php echo $email_id ?>" placeholder="Enter your email address" disabled>
                            </div>
                            <div class="form-group">
                                <label for="email">Secondary Email</label>
                                <input type="semail" class="form-control" name="semail" id="semail" aria-describedby="emailHelp" placeholder="Enter your email address">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="phoneno">Phone No.</label>
                                    <select id="phoneno" name="phone_code" class="form-control arrow-down">
                                        <?php
                                        $query_country = mysqli_query($conn, "SELECT * FROM countries");
                                        while ($row = mysqli_fetch_assoc($query_country)) {
                                            $country_code = $row['country_code'];
                                            $country_id = $row['country_id'];
                                            echo "<option value='$country_id'>$country_code</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group phonenumber">
                                        <label for="phone"><br></label>
                                        <input type="tel" name="phone_no" class="form-control" id="phone" placeholder="Enter your Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Profile Picture</label>
                                <div class="displaypicture">
                                    <label for="file-input">
                                        <img src="img/myprofile/upload-file.png">
                                    </label>
                                    <input id="file-input" name="profile_pic" type="file">
                                </div>
                            </div>
                            <div class="row btn-height">
                                <button type="submit" name="profile" class="btn btn-primary color-btn">SUBMIT</button>
                            </div>
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