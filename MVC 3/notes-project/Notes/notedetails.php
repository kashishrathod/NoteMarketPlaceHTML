<?php
include "db_connection.php";
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



// $query_user = mysqli_query($conn, "SELECT * FROM users WHERE userid=$seller");
// while ($row = mysqli_fetch_assoc($query_user)) {
    
// }

$query_same_note = mysqli_query($conn, "SELECT * FROM downloads WHERE note_id=$id AND downloader=$user");
$count_same_note = mysqli_num_rows($query_same_note);

if (isset($_POST['download'])) {
    if ($count_same_note == 0 && $user != $seller_id) {
        $query_attach = mysqli_query($conn, "SELECT file_path FROM seller_notes_attachments WHERE note_id=$id");
        while ($row = mysqli_fetch_assoc($query_attach)) {
            $path = $row['file_path'];
            $query_download = mysqli_query($conn, "INSERT INTO downloads(note_id, seller, downloader, allow_download,
            attachment_path, isattachdownloaded, downloaded_date, ispaid, purchased_price, note_title, note_category) VALUES
            ($id, $seller, $user, 1, '$path', 1, NOW(), 2, '$price', '$title', '$category_name')");
            if (!$query_download) {
                echo "fail";
            }
        }
    }


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

if (isset($_POST['yes-popup'])) {

    if ($count_same_note == 0 && $user != $seller_id) {
        $query_attach1 = mysqli_query($conn, "SELECT file_path FROM seller_notes_attachments WHERE note_id=$id");
        while ($row = mysqli_fetch_assoc($query_attach1)) {
            $path = $row['file_path'];
            $query_download_paid = mysqli_query($conn, "INSERT INTO downloads(note_id, seller, downloader, allow_download,
            attachment_path, isattachdownloaded, downloaded_date, ispaid, purchased_price, note_title, note_category) VALUES
            ($id, $seller, $user, 0, '$path', 0, NOW(), 1, '$price', '$title', '$category_name')");
        }

        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  // This is fixed port for gmail SMTP

            $config_email = 'gopirathod1601@gmail.com';
            $mail->Username = $config_email;
            $mail->Password = 'Kashish@1602';

            $mail->setFrom($email, 'kashish');

            $mail->addAddress($email_id, $name);  // This email is where you want to send the email
            $mail->addReplyTo($email, $first_name);  // If receiver replies to the email, it will be sent to this email address
            //$mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');

            // Setting the email content
            $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
            //$mail->Subject = "Send email using Gmail SMTP and PHPMailer";       //subject line of email


            $mail->Body = "<b>Email from: $email_id <br>
                Email sent to: $email <br>
                Subject: $name Allows you to download a note <br>
                Body: <br>
                Hello $first_name, 
                We would like to inform you that, $name Allows you to download a note.
                Please login and see My Download tabs to download particular note.
                Regards, <br>
                Notes Marketplace</b>";
            //Email body
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email

            $mail->send();
            $mail_1 = true;
            //echo "Email message sent.";
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    }
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

    <?php include "nav.php"; ?>

    <section id="notedetails">
        <div class="container line">
            <div class="row">
                <div class="col-md-12">
                    <h4>Note Details</h4>
                </div>
            </div>

            <div class="row">
                <?php
                ?>
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
                                    if (isset($_SESSION['email'])) {
                                        if ($free == '2') { ?>
                                            <button type='submit' name='download' class='btn btn-primary' style='background-color: #6255a5;'>DOWNLOAD</button>

                                        <?php  } else {  ?>
                                            <a role='button' type='submit' name='download-paid' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal1'>DOWNLOAD / $<?php echo $price; ?></a>
                                    <?php  }
                                    } else {
                                        echo "<a role='button' type='submit' class='btn btn-primary' href='login.php'>DOWNLOAD</a>";
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
                    <iframe src="customer_review.php?id=<?php echo $id; ?>" width="100%" height="400">
                    </iframe>

                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <form action="" method="POST">
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="thanks">
                            <p>Are you sure you want to download this Paid note. Please confirm.</p>

                            <button type="submit" class="btn btn-primary" name="yes-popup">Yes</button>
                            <button type="submit" class="btn btn-primary" name="no">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        
        $query_config = mysqli_query($conn, "SELECT info_value FROM system_configuration WHERE cofig_id=2");
        while($row = mysqli_fetch_assoc($query_config)){
            $info_value = $row['info_value'];
        }
        
        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: right">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="thanks">
                            <img src="img/SUCCESS.png" alt="success" style="display: block; margin: 0 auto;">
                            <h6 style="text-align: center">Thank you for Purchasing!</h6>
                            <p><b>Dear <?php echo $first_name; ?>,</b></p>
                            <p>As this is paid notes-you need to pay to seller Rahil shah offline.We will send him an email that you want to download this note.He may contact you further for payment process completion.</p>
                            <p>In case you have urgancy, <br>Please Contact us on +91<?php echo $info_value ?>.</p>
                            <p>Once he receives the payment and acknowledge us-selected notes you can see over my download tab for download.</p>
                            <p>Have a good day.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--footer-->

    <?php include "footer.php"; ?>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- <script>
        $("#yes").click(function() {
            $('#exampleModal1').modal('hide');
        });
    </script> -->
    <script>
        <?php if ($mail_1) { ?>
            $("#exampleModal1").modal('hide');
            $("#exampleModal").modal('show');

        <?php } ?>
    </script>

    <script src="js/script.js"></script>
</body>

</html>