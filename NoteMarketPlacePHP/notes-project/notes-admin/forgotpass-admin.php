<?php
include "admin_db.php";

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            
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
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

    <!--Forgotpassword section-->
    <section id="forgotpass">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-8 col-10 logo-fp">
                    <div id="logo" class="text-center">
                        <img src="img/login-img/top-logo.png" class="img-fluid">
                    </div>
                    <form action="forgotpass-admin.php" method="POST" class="white-bg-fp">
                        <h3 id="login-page">FORGOT PASSWORD?</h3>
                        <p>Enter your email to reset your password</p>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>

                        <button type="submit" name="verify" class="btn btn-block btn-primary fpbtn">SUBMIT</button>

                        <?php
                        if(isset($_POST['verify'])){

                            $email = $_POST['email'];
                            $query = "SELECT * from users where email_id='$email' AND role_id='2' AND isactive=1";
                            $result = mysqli_query($conn, $query);
                            $count = mysqli_num_rows($result);
                
                            if($count == 1){
                
                            function generate_password($length = 8){
                                $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                                          '0123456789`-=~!@#$%^&*()_+,./<>?;:[]{}\|';
                      
                                $str = '';
                                $max = strlen($chars) - 1;
                      
                                for ($i=0; $i < $length; $i++)
                                  $str .= $chars[random_int(0, $max)];
                      
                                return $str;
                              }
                              $generate_password = generate_password();  
                              
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
                                    
                                    $mail->setFrom($config_email, 'notemarketplace');
                                
                                    $mail->addAddress($email, 'username');  // This email is where you want to send the email
                                    $mail->addReplyTo($config_email, 'kashish');  // If receiver replies to the email, it will be sent to this email address
                                    //$mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');   
                                 
                                    // Setting the email content
                                    $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
                                    $mail->Subject = "new password";       //subject line of email
                                    
                                    
                                    $mail->Body = "Hello,<br>
                                    We have generated a new password for you
                                    Password: $generate_password<br>
                                    Regards,<br>
                                    Notes Marketplace";
                                    //Email body
                                    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';   //Alternate body of email
                                 
                                    $mail->send();
                                    //echo "Email message sent.";
                                }
                                
                                catch (Exception $e) {
                                    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
                                }
                                echo "<h6 style='color:black'>Your password has been changed successfully and <b>newly generated password</b> is sent on your registered email address</h6>";
                
                               $query = "update users set password='$generate_password' where email_id='$email'";
                               mysqli_query($conn, $query);
                
                              }
                              else{
                                echo "Your email id <b>$email</b> is not registered.";
                            }
                            }    
                        ?>

                    </form>

                </div>
                <div class="col-lg-4 col-md-3 col-sm-2 col-1"></div>
            </div>
        </div>
    </section>


    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

</body>

</html>