<?php include "admin_db.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query_userid = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
    while ($row = mysqli_fetch_assoc($query_userid)) {
        $userid = $row['userid'];
    }
}

if (isset($_GET['id'])) {
    $id1 = $_GET['id'];
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $query_attch = mysqli_query($conn, "SELECT * FROM seller_notes_attachments WHERE note_id = $id1");
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

if (isset($_GET['memberid'])) {
    $memberid = $_GET['memberid'];
} else {
    $memberid = "";
}

if (isset($_POST['Unpublish'])) {
    $noteid = $_POST['noteid'];
    $remark = $_POST['remark'];
    $unpublish_update = mysqli_query($conn, "UPDATE seller_notes SET status=11, actionby=$userid, admin_remark='$remark' WHERE seller_note_id=$noteid");

    $query_seller_mail = mysqli_query($conn, "SELECT seller_notes.seller_id, users.firstname, users.lastname,
    users.email_id FROM seller_notes LEFT JOIN users ON seller_notes.seller_id=users.userid");
    while($row = mysqli_fetch_assoc($query_seller_mail)){
        $seller_name = $row['firstname'];
        $seller_email = $row['email_id'];
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

        $mail->addAddress($seller_email, $seller_name);  // This email is where you want to send the email
        $mail->addReplyTo($config_email, 'kashish');  // If receiver replies to the email, it will be sent to this email address
        //$mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');   

        // Setting the email content
        $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
        $mail->Subject = "unpublish book";       //subject line of email


        $mail->Body = "Email from: <Support Email>
        Email sent to: $seller_email
        Subject: Sorry! We need to remove your notes from our portal. 
        Body:
        Hello $seller_name, 
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
    <!-- datatable -->
    <link rel="stylesheet" href="css/jquery.dataTables.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <script type="text/javascript">
        function publish() {
            var search_publish = $("#search_publish").val();
            var seller = $("#seller").val();
            var member = '<?php echo $memberid ?>'
            $.ajax({
                type: "GET",
                url: "AJAX/publish_note_ajax.php",
                data: {
                    search_publish_data: search_publish,
                    seller_data: seller,
                    member_data: member
                },
                success: function(data) {
                    $("#publish-ajax").html(data);
                }
            });
        }

        $(document).ready(function() {
            publish();
        });
    </script>
</head>

<body>
    <?php include "nav-admin.php" ?>

    <div class="general-height">
        <section id="published-notes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 general">
                        <h3>Published Notes</h3>
                        <p>Seller</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-7 general">
                        <div class="form-group">
                            <select id="seller" onchange="publish();" class="form-control arrow-down">
                                <option value="" selected disabled>Select Seller</option>
                                <?php
                                $query_seller = mysqli_query($conn, "SELECT DISTINCT seller_notes.seller_id, users.firstname,
                                users.lastname FROM seller_notes LEFT JOIN users ON seller_notes.seller_id=users.userid WHERE
                                seller_notes.status=9");
                                while ($row = mysqli_fetch_assoc($query_seller)) {
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $seller_id = $row['seller_id'];
                                    echo "<option value='$seller_id'>$firstname $lastname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-0 col-0"></div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <button class="btn btn-primary publish-search" onclick="publish();">Search</button>
                        <input type="search" id="search_publish" placeholder=' &#xF002;  Search' />
                    </div>
                </div>
                <div id="publish-ajax"></div>

            </div>
        </section>
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