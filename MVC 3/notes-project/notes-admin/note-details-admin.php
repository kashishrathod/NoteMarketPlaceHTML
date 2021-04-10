<?php

include "admin_db.php";
session_start();
$mail_1 = false;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "select * from users where email_id='$email'";
    $userid = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($userid)) {
        $user = $row['userid'];
        $first_name = $row['firstname'];
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query_seller_id = mysqli_query($conn, "SELECT * FROM seller_notes WHERE seller_note_id=$id");
    while ($row = mysqli_fetch_assoc($query_seller_id)) {
        $seller_id = $row['seller_id'];
    }
}


$query_details = mysqli_query($conn, "SELECT seller_notes.display_picture,
seller_notes.note_title, seller_notes.university_name,
countries.country_name, seller_notes.course, seller_notes.course_code,
seller_notes.professor, seller_notes.num_of_pages, seller_notes.note_preview,
seller_notes.ispaid, seller_notes.note_description, seller_notes.selling_price, seller_notes.publisheddate,
countries.country_name, note_categories.category_name, seller_notes.seller_id, users.email_id, users.firstname
FROM seller_notes LEFT JOIN countries ON seller_notes.country = countries.country_id LEFT JOIN note_categories
ON seller_notes.category = note_categories.note_categories_id
LEFT JOIN users ON seller_notes.seller_id = users.userid WHERE seller_note_id=$id");
while ($row = mysqli_fetch_assoc($query_details)) {

    $pic = $row['display_picture'];
    $title = $row['note_title'];
    $institute = $row['university_name'];
    $country_name = $row['country_name'];
    $course = $row['course'];
    $course_code = $row['course_code'];
    $professor = $row['professor'];
    $num_of_pages = $row['num_of_pages'];
    $preview = $row['note_preview'];
    $free = $row['ispaid'];
    $price = $row['selling_price'];
    $note_description = $row['note_description'];
    $publisheddate = $row['publisheddate'];
    $category_name = $row['category_name'];
    $seller = $row['seller_id'];
    $email_id = $row['email_id'];
    $name = $row['firstname'];
}

$query_same_note = mysqli_query($conn, "SELECT * FROM downloads WHERE note_id=$id AND downloader=$user");
$count_same_note = mysqli_num_rows($query_same_note);

if (isset($_POST['download'])) {

    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $query_attach = mysqli_query($conn, "SELECT * FROM seller_notes_attachments WHERE note_id=$id");
    while ($row = mysqli_fetch_assoc($query_attach)) {
        $attach_file = $row['file_path'];
        $zip->addFile($attach_file);
    }
    $zip->close();
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);
}


?>

<html>

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
    <meta charset="UTF-8">
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

    <?php include "nav-admin.php" ?>

    <section id="notedetails">
        <div class="container line">
            <div class="row">
                <div class="col-md-12">
                    <h4>Note Details</h4>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-5 col-12">
                            <?php echo "<img src='$pic' alt='book' class='img-fluid' style='height: 300px'>";  ?>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <h3> <?php echo "$title"; ?> </h3>
                            <p><span><?php echo $category_name; ?></span></p>
                            <p id="review"><?php echo $note_description; ?></p>
                            <form action="" method="POST">

                                <?php
                                if (isset($_SESSION['email'])) { ?>
                                    <button type='submit' name='download' class='btn btn-primary' style='background-color: #6255a5;'>DOWNLOAD</button>
                                <?php } else {
                                    echo "<a role='button' type='submit' class='btn btn-primary' href='login-admin.php'>DOWNLOAD</a>";
                                }
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-7 col-6">
                            <div class="details">
                                <p>Institution:</p>
                                <p>Country:</p>
                                <p>Course Name:</p>
                                <p>Course Code:</p>
                                <p>Professor:</p>
                                <p>Number of Pages:</p>
                                <p>Approved Date:</p>
                                <p>Rating:</p>
                            </div>
                        </div>
                        <div class="col-md-5 col-6">
                            <div class="details-info">
                                <p><?php echo $institute; ?></p>
                                <p><?php echo $country_name; ?></p>
                                <p><?php echo $course; ?></p>
                                <p><?php echo $course_code; ?></p>
                                <p><?php echo $professor; ?></p>
                                <p><?php echo $num_of_pages; ?></p>
                                <p><?php echo $publisheddate; ?></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div id="<?php echo $id; ?>" start="<?php echo $rate ?>" style="margin-top: -15px;"></div>
                                        <?php
                                        $query_rating = mysqli_query($conn, "SELECT avg(rating) FROM seller_notes_review WHERE note_id=$id");
                                        while ($row = mysqli_fetch_assoc($query_rating)) {
                                            $rate = $row['avg(rating)'];
                                        }
                                        ?>
                                        <?php if ($rate != 0) { ?>
                                            <script>
                                                $('#<?php echo $id; ?>').jsRapStar({
                                                    length: 5,
                                                    value: '<?php echo $rate; ?>',
                                                    enabled: false
                                                });
                                            </script>
                                        <?php     } else { ?>
                                            <script>
                                                $('#<?php echo $id; ?>').jsRapStar({
                                                    length: 5,
                                                    value: 0,
                                                    enabled: false
                                                });
                                            </script>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        $review = mysqli_query($conn, "SELECT * FROM seller_notes_review WHERE note_id=$id");
                                        $review_count = mysqli_num_rows($review);
                                        ?>

                                        <?php
                                        if ($review_count == 0) { ?>
                                            <p id="star-review">No Review</p>
                                        <?php     } else { ?>
                                            <p id="star-review"><?php echo $review_count; ?> Review</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $query_inappropriate = mysqli_query($conn, "SELECT * FROM seller_notes_report_issue WHERE note_id=$id");
                        $count_inappropriate = mysqli_num_rows($query_inappropriate);
                        ?>

                        <?php
                        if ($count_inappropriate == 0) { ?>
                            <p id="red-text">No Users have marked this note as inappropriate</p>
                        <?php } else { ?>
                            <p id="red-text"><?php echo $count_inappropriate; ?> Users have marked this note as inappropriate</p>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="notepreview">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <h4>Notes Preview</h4>
                    <!-- responsive iframe -->
                    <!-- ============== -->

                    <div id="Iframe-Cicis-Menu-To-Go" class="set-margin-cicis-menu-to-go set-padding-cicis-menu-to-go set-border-cicis-menu-to-go set-box-shadow-cicis-menu-to-go center-block-horiz">
                        <div class="responsive-wrapper 
     responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
                            <?php echo "<iframe src='$preview'>"; ?>
                            <p style="font-size: 110%;"><em><strong>ERROR: </strong>
                                    An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file<?php echo "<a href='$preview'>"; ?>with this link.</a></p>
                            <?php echo "</iframe>"; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                    <h4>Customer Review</h4>
                    <iframe src="review-admin.php?id=<?php echo $id; ?>" width="100%" height="400">
                    </iframe>

                </div>
            </div>
        </div>
    </section>

    <!--footer-->
    <?php include "footer-admin.php" ?>
    <!--footer end-->


    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script>
        <?php if ($mail_1) { ?>
            $("#exampleModal1").modal('hide');
            $("#exampleModal").modal('show');

        <?php } ?>
    </script>

    <script src="js/script.js"></script>
</body>

</html>