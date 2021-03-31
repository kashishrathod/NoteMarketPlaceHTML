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
        $id = $row['userid'];
        $name = $row['firstname'];
    }
}


if (isset($_POST['search'])) {

    $buyer_request = $_POST['buyer_request'];
    $query = "SELECT downloads.note_title, downloads.seller, downloads.downloader, downloads.note_id, downloads.note_category, reference_data.ref_value,
    downloads.purchased_price, downloads.downloaded_date, users.firstname, users.email_id, user_profile.phone_no, countries.country_code FROM downloads LEFT JOIN reference_data ON
    downloads.ispaid=reference_data.reference_id LEFT JOIN users ON downloads.downloader = users.userid LEFT JOIN user_profile ON downloads.seller=user_profile.user_id
    LEFT JOIN countries ON user_profile.phone_code=countries.country_id
    WHERE downloads.allow_download=0 AND downloads.seller=$id AND downloads.ispaid=1 AND (downloads.note_title LIKE '%$buyer_request%' OR downloads.note_category LIKE '%$buyer_request%' OR downloads.purchased_price LIKE '%$buyer_request%')";
    $result = mysqli_query($conn, $query);
} else {

    $query = "SELECT downloads.note_title, downloads.seller, downloads.downloader, downloads.note_id, downloads.note_category, reference_data.ref_value,
    downloads.purchased_price, downloads.downloaded_date, users.firstname, users.email_id, user_profile.phone_no, countries.country_code FROM downloads LEFT JOIN reference_data ON
    downloads.ispaid=reference_data.reference_id LEFT JOIN users ON downloads.downloader = users.userid LEFT JOIN user_profile ON downloads.seller=user_profile.user_id
    LEFT JOIN countries ON user_profile.phone_code=countries.country_id
    WHERE downloads.allow_download=0 AND downloads.seller=$id AND downloads.ispaid=1";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die(mysqli_error($conn));
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
    <link rel="shortcut icon" href="img/home/favicon.ico">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css\jquery.dataTables.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <?php include "nav.php";
    ?>

    <section id="buyer-request">
        <div class="container buyer">

            <div>
                <table id="myTable" class="table border buyer-width">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                            <h4>Buyer-request</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-12">
                            <form method="POST">
                                <button type="submit" class="btn" name="search">Search</button>
                                <label><input type="search" class="form-control" aria-controls="myTable" name="buyer_request" placeholder='  &#xf002;  Search' /></label>
                            </form>
                        </div>
                    </div>

                    <thead>
                        <tr>
                            <th scope="col">SR NO.</th>
                            <th scope="col">NOTE TITLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">BUYER</th>
                            <th scope="col">PHONE NO</th>
                            <th scope="col">SELL TYPE</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">DOWNLOADED DATE/TIME</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $i = 1;

                        while ($row = mysqli_fetch_assoc($result)) {

                            $note_title = $row['note_title'];
                            $category_name = $row['note_category'];
                            $ref_value = $row['ref_value'];
                            $purchased_price = $row['purchased_price'];
                            $downloaded_date = $row['downloaded_date'];
                            $note_id = $row['note_id'];
                            $downloader = $row['downloader'];
                            $email_buyer = $row['email_id'];
                            $phone = $row['phone_no'];
                            $phone_code = $row['country_code'];
                            $fname_buyer = $row['firstname'];

                            

                            echo "<tr>
                                <td>$i</td>
                                <td>$note_title</td>
                                <td>$category_name</td>
                                <td>$email_buyer</td>
                                <td>$phone_code&nbsp;$phone</td>
                                <td>$ref_value</td>
                                <td>$purchased_price</td>
                                <td>$downloaded_date</td>
                                <td>";
                            echo "<div class='display-block'>";
                            echo "<img src='img/dashboard/eye.png' alt='delete' class='eye-img'>";

                            echo "<div class='dropdown dropleft drop-border'>";
                            echo "<a class='btn' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
                            echo "<img src='img/Dashboard/dots.png'>";
                            echo "</a>";
                            echo "<div class='dropdown-menu dots-shadow' aria-labelledby='dropdownMenuLink'>";

                            echo "<a class='dropdown-item' href='http://localhost/notes-project/Notes/buyerrequest.php?id=$note_id'>Allow Download</a>";
                            if (isset($_GET['id'])) {
                                $id1 = $_GET['id'];
                                $query_allow = mysqli_query($conn, "UPDATE downloads SET allow_download=1 WHERE note_id=$id1");

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

                                    $mail->addAddress($email_buyer, $fname_buyer);  // This email is where you want to send the email
                                    $mail->addReplyTo($email, $name);  // If receiver replies to the email, it will be sent to this email address
                                    //$mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');

                                    // Setting the email content
                                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                                    //$mail->Subject = "Send email using Gmail SMTP and PHPMailer";       //subject line of email


                                    $mail->Body = "<b>Email from: $email <br>
                                    Email sent to: $email_buyer <br>
                                    Subject: $name Allows you to download a note <br>
                                    Body: <br>
                                    Hello , $fname_buyer<br> 
                                    We would like to inform you that, $name Allows you to download a note.
                                    Please login and see My Download tabs to download particular note.
                                    Regards, <br>
                                    Notes Marketplace</b>";
                                    //Email body
                                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email

                                    $mail->send();
                                    //echo "Email message sent.";
                                } catch (Exception $e) {
                                    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                                }
                            }

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!--footer-->
    <?php include "footer.php"; ?>

    <!--popper-->
    <script src="js/popper.min.js"></script>

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>
    <script src="js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "scrollX": true
            });
        });
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>