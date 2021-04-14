<?php
include "db_connection.php";

$phone_msg = true;

session_start();

if (isset($_SESSION['email'])) {

    $address1 = "";
    $emailid = "";
    $phone = "";
    $city = "";
    $zipcode = "";
    $address2 = "";
    $state = "";
    $country = "";
    $university = "";
    $college = "";
    $dob = "";
    $phone_code = "";
    $gender = "";
    $lname = "";
    $fname = "";

    $email = $_SESSION['email'];
    $query = "select * from users where email_id='$email'";
    $userid = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($userid)) {
        $id = $row['userid'];
        $fname = $row['firstname'];
        $lname = $row['lastname'];
    }

    $query_delete = mysqli_query($conn, "SELECT profile_picture FROM user_profile WHERE user_id=$id");
    while ($row = mysqli_fetch_assoc($query_delete)) {
        $delete_pic = $row['profile_picture'];
    }

    $query_count = "SELECT * FROM user_profile WHERE user_id=$id";
    $result_count = mysqli_query($conn, $query_count);
    $row_count = mysqli_num_rows($result_count);
    while ($row = mysqli_fetch_assoc($result_count)) {
        $address1 = $row['address_1'];
        $emailid = $row['secondary_email'];
        $phone = $row['phone_no'];
        $city = $row['city'];
        $zipcode = $row['zip_code'];
        $address2 = $row['address_2'];
        $state = $row['state'];
        $country = $row['country'];
        $university = $row['university'];
        $college = $row['college'];
        $dob = $row['date_of_birth'];
        $phone_code = $row['phone_code'];
        $gender = $row['gender'];
    }


    if ($row_count > 0) {

        if (isset($_POST['submit'])) {
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $emailid = $_POST['emailid'];
            $address1 = $_POST['address1'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $zipcode = $_POST['zipcode'];
            $address2 = $_POST['address2'];
            $state = $_POST['state'];
            $country = $_POST['country'];
            $university = $_POST['university'];
            $college = $_POST['college'];
            $dob = $_POST['dob'];
            $phone_code = $_POST['phoneno'];
            $gender = $_POST['gender'];

            if (!(is_numeric($phone)) && $phone != "") {
                $phone_msg = false;
            } else {
                $query_update = "UPDATE user_profile SET address_1='$address1', phone_no='$phone',
                city='$city', zip_code='$zipcode', address_2='$address2', state='$state',
                university='$university', college='$college', date_of_birth='$dob', gender=$gender,
                country=$country, phone_code=$phone_code WHERE user_id=$id";

                $result_update = mysqli_query($conn, $query_update);
            }


            $files = $_FILES['display'];


            $filename = $files['name'];
            $filetmp = $files['tmp_name'];


            $extention = explode('.', $filename);
            $filecheck = strtolower(end($extention));

            $fileextstored = array('jpg', 'png', 'jpeg');

            $note_id = mysqli_insert_id($conn);

            if (in_array($filecheck, $fileextstored)) {
                if (!is_dir('../Member/')) {
                    mkdir('../Member/');
                }

                if (!is_dir('../Member/' . $id)) {
                    mkdir('../Member/' . $id);
                }

                $destinationfile = '../Member/' . $id . '/' . "display-" . time() . '.' . $filecheck;
                move_uploaded_file($filetmp, $destinationfile);

                // delete profile pic

                if ($delete_pic != '../Member/default/reviewer-3.png') {
                    unlink($delete_pic);
                }

                $display_query = mysqli_query($conn, "UPDATE user_profile SET profile_picture='$destinationfile' WHERE user_id=$id");
            }

            $query_user = "UPDATE users SET firstname='$firstname', lastname='$lastname' WHERE userid=$id";
            $result_user = mysqli_query($conn, $query_user);
        }
    } else if (isset($_POST['submit'])) {

        $emailid = $_POST['emailid'];
        $phone = $_POST['phone'];
        $address1 = $_POST['address1'];
        $city = $_POST['city'];
        $zipcode = $_POST['zipcode'];
        $address2 = $_POST['address2'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $university = $_POST['university'];
        $college = $_POST['college'];
        $dob = $_POST['dob'];
        $phone_code = $_POST['phoneno'];
        $gender = $_POST['gender'];

        if (!(is_numeric($phone)) && $phone != "") {
            $phone_msg = false;
        } else {

            $query_insert = "INSERT INTO user_profile(user_id, gender, phone_code, date_of_birth, secondary_email, phone_no, profile_picture,
            address_1, address_2, city, state, zip_code, country, university, college, createddate) VALUES($id, $gender, $phone_code, '$dob', '$emailid', '$phone',
            '../Member/default/reviewer-3.png', '$address1', '$address2', '$city', '$state', '$zipcode', '$country', '$university', '$college', NOW())";

            $result_insert = mysqli_query($conn, $query_insert);
            header("Refresh:0;");
        }



        $files = $_FILES['display'];


        $filename = $files['name'];
        $filetmp = $files['tmp_name'];


        $extention = explode('.', $filename);
        $filecheck = strtolower(end($extention));

        $fileextstored = array('jpg', 'png', 'jpeg');

        $note_id = mysqli_insert_id($conn);

        if (in_array($filecheck, $fileextstored)) {
            if (!is_dir('../Member/')) {
                mkdir('../Member/');
            }

            if (!is_dir('../Member/' . $id)) {
                mkdir('../Member/' . $id);
            }

            $destinationfile = '../Member/' . $id . '/' . "display-" . time() . '.' . $filecheck;
            move_uploaded_file($filetmp, $destinationfile);

            $display_query = mysqli_query($conn, "UPDATE user_profile SET profile_picture='$destinationfile' WHERE user_id=$id");
        }
    }
} else {
    header('Location: login.php');
}

?>



<html>

<!--head-->

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
    <!--title-->
    <title>Notes Marketplace</title>
    <!--favicon-->
    <link rel="shortcut icon" href="img/home/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>


<body>
    <?php include "nav.php"; ?>

    <section id="userprofile">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="statement" class="text-center">
                            <h3>User Profile</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <form action="" method="POST" enctype="multipart/form-data">

        <section id="userdetails">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Basic Profile Details</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                        <div class="form-group">
                            <label for="fname">First Name<span class="required">*</span></label>
                            <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control" id="fname" placeholder="Enter your first name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" name="emailid" value="<?php echo $email; ?>" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control arrow-down">

                                <?php
                                if ($row_count > 0) {
                                    //echo "<option value='$gender'>$gender_1</option>";
                                    $query_gender = "SELECT * FROM reference_data WHERE (reference_id=3 or reference_id=4 or reference_id=12)";
                                    $result_gender = mysqli_query($conn, $query_gender);
                                    while ($row = mysqli_fetch_assoc($result_gender)) {
                                        $ref_value = $row['ref_value'];
                                        $reference_id = $row['reference_id'];

                                        if ($reference_id == $gender) {
                                            echo "<option value='$reference_id' selected='selected'>$ref_value</option>";
                                        } else if ($reference_id != $gender) {
                                            echo "<option value='$reference_id'>$ref_value</option>";
                                        }
                                    }
                                } else {
                                    $query_gender = "SELECT * FROM reference_data WHERE (reference_id=3 or reference_id=4 or reference_id=12)";
                                    $result_gender = mysqli_query($conn, $query_gender);
                                    echo "<option selected disabled>select your gender</option>";
                                    while ($row = mysqli_fetch_assoc($result_gender)) {
                                        $ref_value = $row['ref_value'];
                                        $reference_id = $row['reference_id'];
                                        echo "<option value='$reference_id'>$ref_value</option>";
                                    }
                                }

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Display Picture</label>
                            <div class="displaypicture">
                                <label for="file-input">
                                    <img src="img/Add-notes/upload-file.png">
                                </label>
                                <input id="file-input" name="display" type="file">
                                <div id="display_picture"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="lname">Last Name<span class="required">*</span></label>
                            <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-control" id="lname" placeholder="Enter your last name">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" value=<?php echo $dob ?> id="dob" placeholder="Enter your date of birth">
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-5 col-5 form-group">
                                <label for="phoneno">Phone No.</label>
                                <select id="phoneno" name="phoneno" class="form-control arrow-down">

                                    <?php
                                    if ($row_count > 0) {
                                        //echo "<option value='$phone_code'>$country_code_1</option>";
                                        $query_code = "SELECT * FROM countries";
                                        $result_code = mysqli_query($conn, $query_code);

                                        while ($row = mysqli_fetch_assoc($result_code)) {
                                            $country_id = $row['country_id'];
                                            $country_code = $row['country_code'];
                                            if ($country_id == $phone_code) {
                                                echo "<option value='$country_id' selected='selected'>$country_code</option>";
                                            } else {
                                                echo "<option value='$country_id'>$country_code</option>";
                                            }
                                        }
                                    } else {
                                        $query_code = "SELECT * FROM countries";
                                        $result_code = mysqli_query($conn, $query_code);

                                        while ($row = mysqli_fetch_assoc($result_code)) {
                                            $country_id = $row['country_id'];
                                            $country_code = $row['country_code'];
                                            echo "<option value='$country_id'>$country_code</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-7 col-7 form-group">
                                <div class="form-group phonenumber">
                                    <label for="phone"><br></label>
                                    <input type="tel" value="<?php echo $phone; ?>" name="phone" class="form-control" id="phone" placeholder="phone no." maxlength="10">
                                    <?php
                                    if ($phone_msg == false) {
                                        echo "<span style='color: red; font-size: 10px;'>only digits are allowed!</span>";
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="userdetails1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Address Details</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">

                        <div class="form-group">
                            <label for="address1">Address Line 1<span class="required">*</span></label>
                            <input type="text" name="address1" value="<?php echo $address1; ?>" class="form-control" id="address1" placeholder="Enter your address" required>

                        </div>
                        <div class="form-group">
                            <label for="city">City<span class="required">*</span></label>
                            <input type="text" name="city" value="<?php echo $city; ?>" class="form-control" id="city" aria-describedby="emailHelp" placeholder="Enter your city" required>
                        </div>
                        <div class="form-group">
                            <label for="zcode">ZipCode<span class="required">*</span></label>
                            <input type="text" name="zipcode" value="<?php echo $zipcode; ?>" class="form-control" id="zcode" aria-describedby="emailHelp" placeholder="Enter your zipcode" required>
                        </div>


                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <label for="address2">Address Line 2</label>
                            <input type="text" name="address2" value="<?php echo $address2; ?>" class="form-control" id="address2" placeholder="Enter your address">
                        </div>
                        <div class="form-group">
                            <label for="state">State<span class="required">*</span></label>
                            <input type="text" name="state" value="<?php echo $state; ?>" class="form-control" id="state" placeholder="Enter your state">
                        </div>
                        <div class="form-group">
                            <label for="country">Country<span class="required">*</span></label>
                            <select id="phoneno" name="country" class="form-control arrow-down">
                                <?php
                                if ($row_count > 0) {

                                    //echo "<option value='$country'>$country_name_1</option>";

                                    $query_code = "SELECT * FROM countries";
                                    $result_code = mysqli_query($conn, $query_code);

                                    while ($row = mysqli_fetch_assoc($result_code)) {
                                        $country_id = $row['country_id'];
                                        $country_name = $row['country_name'];
                                        if ($country_id == $country) {
                                            echo "<option value='$country_id' selected='selected'>$country_name</option>";
                                        } else {
                                            echo "<option value='$country_id'>$country_name</option>";
                                        }
                                    }
                                } else {
                                    $query_code = "SELECT * FROM countries";
                                    $result_code = mysqli_query($conn, $query_code);

                                    while ($row = mysqli_fetch_assoc($result_code)) {
                                        $country_id = $row['country_id'];
                                        $country_name = $row['country_name'];
                                        echo "<option value='$country_id'>$country_name</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="userdetails2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>University and College Information</h3>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="university">University</label>
                            <input type="text" value="<?php echo $university; ?>" name="university" class="form-control" id="university" placeholder="Enter your University">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="college">College</label>
                            <input type="text" value="<?php echo $college; ?>" name="college" class="form-control" id="college" placeholder="Enter your college">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" name="submit" class="btn btn-primary button-width">SUBMIT</button>
                    </div>
                </div>
            </div>
        </section>
    </form>

    <!--footer-->

    <?php include "footer.php"; ?>
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <script>
        var input2 = document.getElementById("file-input");
        var infoArea2 = document.getElementById("display_picture");
        input2.addEventListener("change", showProfileName2);

        function showProfileName2(event) {
            var input2 = event.srcElement;
            var fileName2 = input2.files[0].name;
            infoArea2.textContent = "File name: " + fileName2;
        }
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>
