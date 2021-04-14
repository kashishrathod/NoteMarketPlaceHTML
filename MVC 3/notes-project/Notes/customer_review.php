<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--favicon-->
    <link rel="shortcut icon" href="img/home/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--star-->
    <link rel="stylesheet" href="css/jsRapStar.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jsRapStar.js"></script>

</head>

<body>

</body>

</html>


<?php
include "db_connection.php";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "select userid from users where email_id='$email'";
    $userid = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($userid)) {
        $user = $row['userid'];
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

?>

<div class="container border-black">
    <?php

    $review_data = mysqli_query($conn, "SELECT seller_notes_review.reviewed_by_id,
    seller_notes_review.rating, users.firstname, users.lastname,
    user_profile.profile_picture, users.userid FROM seller_notes_review LEFT JOIN users
     ON seller_notes_review.reviewed_by_id=users.userid
    LEFT JOIN user_profile ON users.userid = user_profile.user_id WHERE note_id=$id AND seller_notes_review.isactive=1");
    while ($row = mysqli_fetch_assoc($review_data)) {
        $review_id = $row['reviewed_by_id'];
        $review_img = $row['profile_picture'];
        $first_name = $row['firstname'];
        $lastname = $row['lastname'];
        $userid = $row['userid'];
    ?>
        <div class="row bottom-black">
            <div style="display: flex;">
                <div class="col-md-2">
                    <?php
                    $count_review = mysqli_num_rows($review_data);
                    if ($count_review != 0) {
                        
                        if ($review_img == "") { ?>
                            <img src="img\notedetails\reviewer-1.png" class="img-fluid rounded-circle" alt="user">
                        <?php } else { ?>
                            <img src="<?php echo $review_img; ?>" class="img-fluid rounded-circle" alt="user">
                        <?php  } ?>

                </div>
                <div class="col-md-10">
                    <?php echo "<h6>$first_name&nbsp;$lastname</h6>"; ?>

                    <div id="rate<?php echo $review_id; ?>" start="<?php echo $rate_user; ?>" style="margin-left: 0px; margin-top: -13px;"></div>
                    <?php
                        $query_review_rate = mysqli_query($conn, "SELECT * FROM seller_notes_review WHERE note_id=$id AND reviewed_by_id=$userid AND isactive=1");
                        while ($row = mysqli_fetch_assoc($query_review_rate)) {
                            $rate_user = $row['rating'];
                            $comment = $row['comments'];
                        }
                    ?>
                    <script>
                        $('#rate<?php echo $review_id; ?>').jsRapStar({
                            length: 5,
                            value: <?php echo $rate_user; ?>,
                            enabled: false
                        });
                    </script>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <p style="margin-left: 80px; margin-top:2px;"><?php echo $comment; ?></p>
            </div>
        <?php  } else {
                        echo "no review";
                    }

        ?>
        </div>
    <?php } ?>
</div>
