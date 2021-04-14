<?php include "admin_db.php";
session_start();

$destinationfile1 = "../Member/Default_.jpg";
$destinationfile = "../Member/Default_.png";
// support email

$query_get_config_value = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='support_email'");
while ($row = mysqli_fetch_assoc($query_get_config_value)) {
    $support_email_value = $row['info_value'];
}
$count_support_email = mysqli_num_rows($query_get_config_value);
if (isset($_POST['config_button'])) {
    $support_email = $_POST['support_email'];
    if ($count_support_email == 0) {
        $insert_support_email = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
        VALUES('support_email', '$support_email', 1)");
    } else {
        $update_support_email = mysqli_query($conn, "UPDATE system_configuration SET info_value='$support_email' WHERE information='support_email'");
    }
}

// phone no

$query_get_phone_no = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='phone_number'");
while ($row = mysqli_fetch_assoc($query_get_phone_no)) {
    $phone_no_value = $row['info_value'];
}
$count_phone_no = mysqli_num_rows($query_get_phone_no);
if (isset($_POST['config_button'])) {
    $phone_number = $_POST['phone_number'];
    if ($count_phone_no == 0) {
        $insert_phone_no = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
        VALUES('phone_number', '$phone_number', 1)");
    } else {
        $update_phone_no = mysqli_query($conn, "UPDATE system_configuration SET info_value='$phone_number' WHERE information='phone_number'");
    }
}

// email_user

$query_get_email_user = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='email_user'");
while ($row = mysqli_fetch_assoc($query_get_email_user)) {
    $email_user_value = $row['info_value'];
}
$count_email_user = mysqli_num_rows($query_get_email_user);
if (isset($_POST['config_button'])) {
    $email_user = $_POST['email_user'];
    if ($count_email_user == 0) {
        $insert_phone_no = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
        VALUES('email_user', '$email_user', 1)");
    } else {
        $update_email_user = mysqli_query($conn, "UPDATE system_configuration SET info_value='$email_user' WHERE information='email_user'");
    }
}

// facebook

$query_get_facebook = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='facebook'");
while ($row = mysqli_fetch_assoc($query_get_facebook)) {
    $facebook_value = $row['info_value'];
}
$count_facebook = mysqli_num_rows($query_get_facebook);
if (isset($_POST['config_button'])) {
    $facebook = $_POST['facebook'];
    if ($count_facebook == 0) {
        $insert_facebook = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
        VALUES('facebook', '$facebook', 1)");
    } else {
        $update_facebook = mysqli_query($conn, "UPDATE system_configuration SET info_value='$facebook' WHERE information='facebook'");
    }
}

// twitter

$query_get_twitter = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='twitter'");
while ($row = mysqli_fetch_assoc($query_get_twitter)) {
    $twitter_value = $row['info_value'];
}
$count_twitter = mysqli_num_rows($query_get_twitter);
if (isset($_POST['config_button'])) {
    $twitter = $_POST['twitter'];
    if ($count_twitter == 0) {
        $insert_twitter = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
        VALUES('twitter', '$twitter', 1)");
    } else {
        $update_twitter = mysqli_query($conn, "UPDATE system_configuration SET info_value='$twitter' WHERE information='twitter'");
    }
}

// linkedin
$query_get_linkedin = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='linkedin'");
while ($row = mysqli_fetch_assoc($query_get_linkedin)) {
    $linkedin_value = $row['info_value'];
}
$count_linkedin = mysqli_num_rows($query_get_linkedin);
if (isset($_POST['config_button'])) {
    $linkedin = $_POST['linkedin'];
    if ($count_linkedin == 0) {
        $insert_linkedin = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
        VALUES('linkedin', '$linkedin', 1)");
    } else {
        $update_linkedin = mysqli_query($conn, "UPDATE system_configuration SET info_value='$linkedin' WHERE information='linkedin'");
    }
}

//upload picture

$query_get_note = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='note'");
$count_note = mysqli_num_rows($query_get_note);
while($row = mysqli_fetch_assoc($query_get_note)){
    $note_value = $row['info_value'];
}

if (isset($_POST['config_button'])) {

    $files1 = $_FILES['note_default'];
    $filename1 = $files1['name'];
    $filetmp1 = $files1['tmp_name'];
    $extention1 = explode('.', $filename1);
    $filecheck1 = strtolower(end($extention1));

    $fileextstored1 = array('jpg', 'png', 'jpeg');
    //display picture

    if (in_array($filecheck1, $fileextstored1)) {
        if (!is_dir('../Member/')) {
            mkdir('../Member/');
        }

        $destinationfile1 = '../Member/' . 'Default_' . '.' . $filecheck1;

        move_uploaded_file($filetmp1, $destinationfile1);
    }
    if ($count_note == 0) {

        $insert_note = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
            VALUES('note', '$destinationfile1', 1)");
    } else {

        $update_note = mysqli_query($conn, "UPDATE system_configuration SET info_value='$destinationfile1' WHERE information='note'");
    }
}

// upload picture for default pic

$query_get_profile = mysqli_query($conn, "SELECT information, info_value FROM system_configuration WHERE information='profile'");
while($row = mysqli_fetch_assoc($query_get_profile)){
    $profile_value = $row ['info_value'];
}
$count_profile = mysqli_num_rows($query_get_profile);

if (isset($_POST['config_button'])) {
    
    $files = $_FILES['profile_default_picture'];
    $filename = $files['name'];
    $filetmp = $files['tmp_name'];
    $extention = explode('.', $filename);
    $filecheck = strtolower(end($extention));

    $fileextstored = array('jpg', 'png', 'jpeg');
    //display picture

    if (in_array($filecheck, $fileextstored)) {
        if (!is_dir('../Member/')) {
            mkdir('../Member/');
        }

        $destinationfile = '../Member/' . 'Default_' . '.' . $filecheck;

        move_uploaded_file($filetmp, $destinationfile);
    }
    if ($count_profile == 0) {

        $insert_profile = mysqli_query($conn, "INSERT INTO system_configuration(information, info_value, isactive)
            VALUES('profile', '$destinationfile', 1)");
    } else {

        $update_profile = mysqli_query($conn, "UPDATE system_configuration SET info_value='$destinationfile' WHERE information='profile'");
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
        <form action="" method="POST" enctype="multipart/form-data">
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
                            <input type="email" name="support_email" value="<?php echo $support_email_value ?>" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Support phone number<span class="required">*</span></label>
                            <input type="tel" name="phone_number" value="<?php echo $phone_no_value ?>" class="form-control" id="phone" placeholder="enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Emails Address(es) (for various events system will send notifications to these userd)<span class="required">*</span></label>
                            <input type="email" class="form-control" value="<?php echo $email_user_value ?>" name="email_user" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook URL</label>
                            <input type="text" class="form-control" value="<?php echo $facebook_value ?>" name="facebook" id="facebook" placeholder="Enter facebook url">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter URL</label>
                            <input type="text" class="form-control" value="<?php echo $twitter_value ?>" name="twitter" id="twitter" placeholder="Enter twitter url">
                        </div>
                        <div class="form-group">
                            <label for="linkedin">Linkedin URL</label>
                            <input type="text" class="form-control" value="<?php echo $linkedin_value ?>" name="linkedin" id="linkedin" placeholder="Enter linkedin url">
                        </div>

                        <div class="form-group">
                            <label>Default image for notes(If seller do not upload)</label>
                            <div class="displaypicture">
                                <label for="file-input_1">
                                    <img src="img/myprofile/upload-file.png">
                                </label>
                                <input id="file-input_1" name="note_default" type="file" value="<?php echo $note_value ?>">
                                <div id="note_default_pic"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Default profile picture(If seller do not upload)</label>
                            <div class="displaypicture">
                                <label for="file-input">
                                    <img src="img/myprofile/upload-file.png">
                                </label>
                                <input id="file-input" name="profile_default_picture" type="file" value="<?php echo $profile_value ?>">
                                <div id="profile_default_pic"></div>
                            </div>
                        </div>
                        <div class="row btn-height">
                            <button type="submit" name="config_button" class="btn btn-primary system-btn">SUBMIT</button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-0 col-0"></div>

                </div>
            </section>
        </form>
    </div>

    <!--footer-->
    <?php include "footer-admin.php" ?>
    <!--footer end-->

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <script>
        var input6 = document.getElementById("file-input_1");
        var infoArea6 = document.getElementById("note_default_pic");
        input6.addEventListener("change", showProfileName6);

        function showProfileName6(event) {
            var input6 = event.srcElement;
            var fileName6 = input6.files[0].name;
            infoArea6.textContent = "File name: " + fileName6;
        }
    </script>
    <script>
        var input7 = document.getElementById("file-input");
        var infoArea7 = document.getElementById("profile_default_pic");
        input7.addEventListener("change", showProfileName7);

        function showProfileName7(event) {
            var input7 = event.srcElement;
            var fileName7 = input7.files[0].name;
            infoArea7.textContent = "File name: " + fileName7;
        }
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>
