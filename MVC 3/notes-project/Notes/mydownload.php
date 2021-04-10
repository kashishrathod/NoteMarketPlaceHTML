<?php include "db_connection.php";
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "select * from users where email_id='$email'";
    $userid = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($userid)) {
        $id_user = $row['userid'];
        $name = $row['firstname'];
    }
}


if (isset($_POST['search'])) {

    $download_search = $_POST['download'];
    $query = "SELECT downloads.note_title, downloads.note_id, downloads.note_category, reference_data.ref_value,
    downloads.purchased_price, downloads.downloaded_date, users.email_id, users.firstname, downloads.seller FROM downloads LEFT JOIN reference_data ON downloads.ispaid=reference_data.reference_id
    LEFT JOIN users ON downloads.seller = users.userid
    WHERE downloads.allow_download=1 AND downloads.downloader=$id_user AND (downloads.note_title LIKE '%$download_search%' OR downloads.note_category LIKE '%$download_search%' OR downloads.purchased_price LIKE '%$download_search%')";
    $result = mysqli_query($conn, $query);
} else {

    $query = "SELECT downloads.note_title, downloads.note_id, downloads.note_category, reference_data.ref_value,
    downloads.purchased_price, downloads.downloaded_date, users.email_id, users.firstname, downloads.seller FROM downloads LEFT JOIN reference_data ON
    downloads.ispaid=reference_data.reference_id LEFT JOIN users ON downloads.seller = users.userid WHERE downloads.allow_download=1 AND downloads.downloader=$id_user";
    $result = mysqli_query($conn, $query);
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
    <link rel="shortcut icon" href="img/home/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css\jquery.dataTables.css">
    <link rel="stylesheet" href="css/jsRapStar.css">

    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>


<body>


    <?php include "nav.php"; ?>

    <section id="mydownload">
        <div class="container">

            <div>
                <table id="myTable" class="table border buyer-width">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                            <h4>My Downloads</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-12">
                            <form method="POST">
                                <button type="submit" class="btn" name="search">Search</button>
                                <label><input type="search" class="form-control" aria-controls="myTable" name="download" placeholder='  &#xf002;  Search' /></label>
                            </form>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">NOTE TITLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">BUYER</th>
                            <th scope="col">SELL TYPE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">DOWNLOADED DATE/TIME</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                            $title = $row['note_title'];
                            $category = $row['note_category'];
                            $sell_type = $row['ref_value'];
                            $price = $row['purchased_price'];
                            $date = $row['downloaded_date'];
                            $noteid = $row['note_id'];
                            $email_id_1 = $row['email_id'];
                            $firstname_1 = $row['firstname'];



                            echo "<tr>
                                    <td>$i</td>
                                    <td><a style='text-decoration: none; color:#6255a5;' href='notedetails.php?id=$noteid'>$title</a></td>
                                    <td>$category</td>
                                    <td>$email</td>
                                    <td>$sell_type</td>
                                    <td>$price</td>
                                    <td>$date</td>
                                    <td>"; ?>

                            <div class="display-block">
                  <?php   echo "<a href='notedetails.php?id=$noteid'><img src='img/dashboard/eye.png' alt='delete' class='eye-img'></a>";  ?>
                                <div class="dropdown dropleft drop-border">
                                    <a class="btn" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="img/Dashboard/dots.png" alt="">
                                    </a>
                                    <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                        <?php echo "<a class='dropdown-item' href='mydownload.php?id=$noteid'>Download Notes</a>"; ?>

                                        <?php echo "<a class='add-padding dropdown-item' data-toggle='modal' data-target='#exampleModal' data-id='$noteid'>Add Reviews/Feedback</a>"; ?>

                                        <?php echo "<a class='report dropdown-item' name='issue' data-id='$title' data-note-id='$noteid' data-toggle='modal' data-target='#exampleModal1'>Report as Inappropriate</a>"; ?>


                                    </div>
                                </div>
                            </div>


                            <?php echo "</td>"; ?>
                            </tr>
                        <?php
                            $i++;
                        }
                        if (isset($_POST['review'])) {
                            $rating = $_POST['rating1'];
                            $star_value = $_POST['star1'];
                            $comment = $_POST['comment'];
                            $query_seller_id_1 = mysqli_query($conn, "SELECT * FROM downloads WHERE note_id = $rating");
                            while ($row = mysqli_fetch_assoc($query_seller_id_1)) {
                                $against_downloader_id = $row['seller'];
                            }

                            $query_review_one_time = mysqli_query($conn, "SELECT * FROM seller_notes_review WHERE note_id=$rating AND reviewed_by_id=$id_user");
                            $count_review_one_time = mysqli_num_rows($query_review_one_time);



                            if ($count_review_one_time == 0) {

                                $query_rating = mysqli_query($conn, "INSERT INTO seller_notes_review(note_id, reviewed_by_id, download_id, rating, comments, isactive)
                                VALUES ($rating, $id_user, $against_downloader_id, $star_value, '$comment', 1)");
                            }
                        }

                        if (isset($_POST['yes-popup'])) {
                            $remark = $_POST['remark'];
                            $noteid_issue = $_POST['noteid'];
                            $download_id = mysqli_query($conn, "SELECT seller FROM downloads WHERE note_id=$noteid_issue");
                            while ($row = mysqli_fetch_assoc($download_id)) {
                                $download = $row['seller'];
                            }
                            $query_issue = mysqli_query($conn, "INSERT INTO seller_notes_report_issue(note_id, reported_by_id,
                            download_id, remark, modifieddate) VALUES($noteid_issue, $id_user, $download, '$remark', NOW())");


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

                                $mail->setFrom($email, $name);

                                $mail->addAddress($email_id_1, $firstname_1);  // This email is where you want to send the email
                                $mail->addReplyTo($email, $name);  // If receiver replies to the email, it will be sent to this email address
                                //$mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');

                                // Setting the email content
                                $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                                //$mail->Subject = "Send email using Gmail SMTP and PHPMailer";       //subject line of email


                                $mail->Body = "<b>Email from: <b>$email</b><br>
                                Email sent to: <b>$email_id_1</b>
                                Subject: $firstname_1 Reported an issue for $title
                                Body:
                                Hello Admins, Email from: $email
                                Email sent to: <Admin Email Address(es) mentioned over system configuration tab>
                                Subject: $firstname_1 Reported an issue for $title
                                Body:
                                Regards,
                                Notes Marketplace</b>";
                                //Email body
                                $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email

                                $mail->send();
                                //echo "Email message sent.";
                            } catch (Exception $e) {
                                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
    </section>

    <!-- Modal -->
    <form method="POST">
        <div class="modal hide" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content popup-padding">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                    <div class="modal-body general">
                        <div id="example"></div>
                        <input value="" name="star1" id="star" type="hidden">
                        <input type="hidden" name="rating1" id="notid_rating">
                    </div>
                    <label style="margin-top: 20px">Comment <span class="required">*</span></label>
                    <input type="text" name="comment">
                    <button type="submit" name="review" class="btn btn-primary btn-popup">SUBMIT</button>
                </div>
            </div>
        </div>


        <div class="modal hide" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="thanks">
                            <input type="text" class="form-control" value="" name="title1" id="note_title" disabled>
                            <label for="" style="margin-top: 10px;">Remark:</label>
                            <textarea rows="4" cols="55" name="remark"></textarea>
                            <button type="submit" class="btn btn-primary" name="yes-popup" style="margin-top: 10px; background-color:#6255a4;">Report an issue</button>
                            <button type="submit" class="btn btn-primary" name="no" style="margin-top: 10px; background-color:#6255a4;">No</button>
                            <input value="" name="noteid" id="note_id" type="hidden">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--footer-->

    <?php include "footer.php"; ?>

    <script src="js/popper.min.js"></script>
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <script src="js/jsRapStar.js"></script>
    <script>
        $('#example').jsRapStar({
            step: false,
            value: 0,
            length: 5,
            starHeight: 64,
            colorFront: '##f0c420 ',
            onClick: function(score) {
                this.StarF.css({
                    color: '#f4c613'
                });
                $('#star').val(score);
            },
            onMousemove: function(score) {
                $(this).attr('title', 'Rate ' + score);
            }
        });
    </script>
    <script src="js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "scrollX": true
            });

        });
    </script>
    <script>
        $(document).on('click', '.add-padding', function() {
            $('#notid_rating').val($(this).data('id'));
        });
    </script>
    <script>
        $(document).on('click', '.report', function() {
            $('#note_title').val($(this).data('id'));
            $('#note_id').val($(this).data('note-id'));
        });
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
</body>

</html>