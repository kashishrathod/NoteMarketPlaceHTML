<?php include "admin_db.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query_userid = mysqli_query($conn, "select userid from users where email_id='$email'");
    while ($row = mysqli_fetch_assoc($query_userid)) {
        $userid = $row['userid'];
    }
}

if (isset($_POST['yes'])) {
    $remark = $_POST['remark'];
    $note_id = $_POST['noteid'];
    $unpublish_update = mysqli_query($conn, "UPDATE seller_notes SET actionby=$userid, admin_remark='$remark', status=11 WHERE seller_note_id=$note_id");
    
    $query_seller_mail_unpublish = mysqli_query($conn, "SELECT seller_notes.seller_id, users.firstname, users.lastname,
    users.email_id FROM seller_notes LEFT JOIN users ON seller_notes.seller_id=users.userid");
    while ($row = mysqli_fetch_assoc($query_seller_mail_unpublish)) {
        $seller_name_dash = $row['firstname'];
        $seller_email_dash = $row['email_id'];
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

        $mail->setFrom($config_email, 'kashish');

        $mail->addAddress($seller_email_dash, $seller_name_dash);  // This email is where you want to send the email
        $mail->addReplyTo($config_email, 'kashish');  // If receiver replies to the email, it will be sent to this email address
        //$mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');   

        // Setting the email content
        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
        $mail->Subject = "unpublish book";       //subject line of email

        $mail->Body = "Email from: <Support Email>
        Email sent to: $seller_name_dash
        Subject: Sorry! We need to remove your notes from our portal. 
        Body:
        Hello $seller_name_dash, 
        We want to inform you that, your note <Note Title> has been removed from the portal.
        Please find our remarks as below -
        $remark
        Regards, 
        Notes Marketplace";
        //Email body
        $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email

        $mail->send();
        //echo "Email message sent.";
    } catch (Exception $e) {
        echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $query_attch = mysqli_query($conn, "SELECT * FROM seller_notes_attachments WHERE note_id = $id");
    while ($row = mysqli_fetch_assoc($query_attch)) {
        $path = $row['file_path'];
        $zip->addFile($path);
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
    <!-- datatble -->
    <link rel="stylesheet" href="css/jquery.dataTables.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        function dashboard_search() {
            var search_input = $("#search_1").val();
            var drop_month = $("#monthdrop").val();
            $.ajax({
                type: "GET",
                url: "AJAX/dashboard-ajax.php",
                data: {
                    search_data: search_input,
                    drop_data: drop_month
                },
                success: function(data) {
                    $("#dashboard-ajax").html(data);
                }
            });
        }
        $(document).ready(function() {
            dashboard_search();
        });
    </script>
</head>

<body>

    <?php include "nav-admin.php"; ?>
    <div class="general-height">
        <section id="dashboard">
            <div class="container dashboard-padding">

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 general">
                        <h3 class="dashboard-title">Dashboard</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 dashboard-border">
                    <a href="notes-under-review.php" style="color: #6244a5; text-decoration: none;">
                        <?php
                        $query_dashboard_review = mysqli_query($conn, "SELECT * FROM seller_notes WHERE (status=7 OR status=8)");
                        $count_in_review = mysqli_num_rows($query_dashboard_review);
                        ?>
                        <h5 class="text-center"><?php echo $count_in_review ?></h5>
                        <p class="text-center">Number of Notes in Review for Publish</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 dashboard-border">
                    <a href="downloaded-notes.php" style="color: #6244a5; text-decoration: none;">
                        <?php 
                        $query_download_notes = mysqli_query($conn, "SELECT * FROM downloads
                        WHERE isattachdownloaded=1 AND downloaded_date > now() - INTERVAL 7 day");
                        $count_downloaded_note = mysqli_num_rows($query_download_notes);
                        
                        ?>
                        <h5 class="text-center"><?php echo $count_downloaded_note ?></h5>
                        <p class="text-center">Number of New Notes Downloaded(Last 7 days)</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 dashboard-border-third">
                    <a href="member.php" style="color: #6244a5; text-decoration: none;">
                    <?php 
                    $query_user_data = mysqli_query($conn, "SELECT * FROM users WHERE createddate > now() - INTERVAL 7 day");
                    $count_user_data = mysqli_num_rows($query_user_data);
                    
                    
                    ?>
                        <h5 class="text-center"><?php echo $count_user_data ?></h5>
                        <p class="text-center">Number of New Registrations(Last 7 days)</p>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-12 col-12 publish-note general">
                        <h4>Published Notes</h4>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-12 col-12 dashboard-right general">

                        <div class="pull-right right-corner">
                            <input type="search" id="search_1" placeholder=' &#xF002;  Search' class="mr-2" />
                            <button class="btn mr-2" onclick="dashboard_search();" name="dash">Search</button>
                            <?php
                            for ($j = 0; $j <= 5; $j++) {
                                // Store the months in an array
                                $months[] = date("m-Y", strtotime(date('Y-m-01') . " -$j months"));
                                $lenght = count($months);
                            }
                            ?>
                            <select id="monthdrop" class="arrow-down mr-2 arrow-padding" onchange="dashboard_search();">
                                <?php
                                for ($j = 0; $j <= $lenght; $j++) {
                                    echo "<option value='$months[$j]'>$months[$j]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="dashboard-ajax"></div>
            </div>
        </section>
    </div>
    <div class="modal hide" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="thanks">
                        <form action="" method="POST">
                            <input type="text" class="form-control" value="" name="title1" id="note_title" disabled>
                            <label for="" style="margin-top: 10px;">Remark:</label>
                            <textarea rows="4" cols="50" name="remark"></textarea>
                            <button type="submit" class="btn btn-primary" name="yes" style="margin-top: 10px; background-color:#6255a4;">Unpublish</button>
                            <button type="submit" class="btn btn-primary" name="no" style="margin-top: 10px; background-color:#6255a4;">Cancle</button>
                            <input value="" name="noteid" id="note_id" type="hidden">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <?php include "footer-admin.php" ?>
    <!--footer end-->

    <!--popper file-->
    <script src="js/popper.min.js"></script>

    <!-- datatable -->
    <script src="js/datatables.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>