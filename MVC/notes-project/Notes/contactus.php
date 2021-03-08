<?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;


        $email_expression = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
        $name_expression = '/^[a-zA-Z ]*$/';
        
        $mail_sent = false;
        $user_validation = true;
        $subject_validation = true;
        $des_validation = true;
        $mail_validation = true;
        
       

if(isset($_POST['submit']))
{
    $subject = $_POST['subject'];
    $body = $_POST['description'];
    $user = $_POST['name'];
    $useremail = $_POST['email'];


    preg_match($name_expression, $user, $user_1);
    if (!$user_1[0]) {
        $user_validation = false;
    }

    preg_match($name_expression, $subject, $subject_1);
    if (!$subject_1[0]) {
        $subject_validation = false;
    }

    preg_match($name_expression, $body, $comment_1);
    if (!$comment_1[0]) {
        $des_validation = false;
    }

    if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        $mail_validation = false;
    }
    if($useremail != "" && $user_validation && $subject_validation && $des_validation && $mail_validation)
    {
        

        require 'phpmailer/Exception.php';
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        
        $mail = new PHPMailer(true);

        try {
           
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;  
         
            $config_email = 'gopirathod1601@gmail.com';
            $mail->Username = $config_email;  
            $mail->Password = 'Kashish@1602';  
         
            
            $mail->setFrom($useremail, $user);  
            
            $mail->addAddress('gopirathod1601@gmail.com', 'Kashish');  
            $mail->addReplyTo($useremail, $user);   
         
            
            $mail->IsHTML(true);  
            $mail->Subject = "$subject";       
            $mail->Body = "<b>From:$user<br> subject: $subject <br> comment :$body<br><br> sendername:$useremail</b>";   //Email body
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
         
            $mail->send();
            echo "Email message sent.";
        } 
        
        catch (Exception $e) {
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

    <?php include "nav.php";
       
       ?>

    <section id="userprofile">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="statement" class="text-center">
                            <h3>Contact Us</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contactus">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Get In Touch</h3>
                    <p>Let us know how to get back to you</p>
                </div>
            </div>
            <form action="contactus.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fulllname">Full Name<span class="required">*</span></label>
                        <input type="text" name="name" class="form-control" id="fullname" placeholder="Enter your full name" />
                        <div class="correct-email">
                            <?php
                                if (!$user_validation) {
                                    echo "Please enter valid name!";
                                }
                             ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email<span class="required">*</span></label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address">

                        <div class="correct-email">
                            <?php
                                if (!$mail_validation) {
                                    echo "Please enter valid email!";
                                }
                             ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sub">Subject<span class="required">*</span></label>
                        <input type="text" name="subject" class="form-control" id="sub" placeholder="Enter your subject">

                        <div class="correct-email">
                            <?php
                                if (!$subject_validation) {
                                    echo "Please enter valid subject!";
                                }
                             ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description">Description<span class="required">*</span></label><br>
                        <textarea id="description" name="description" rows="4" cols="65" placeholder="Enter your description"></textarea>
                        <div class="correct-email">
                            <?php
                                if (!$des_validation) {
                                    echo "Please enter comment!";
                                }
                             ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" name="submit" class="btn contactbtn">SUBMIT</button>
                </div>
            </div>

            </form>

        </div>
    </section>

    <!--footer-->

   <?php include "footer.php"; ?>


    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>
