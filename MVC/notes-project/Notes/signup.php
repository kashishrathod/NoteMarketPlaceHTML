<?php include "db_connection.php";

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;


        $mail_exist = false;
        $mail_sent = false;
        $message = "Email already exists!";
        $password_match = true;
        $length_check = true;


        if(isset($_POST['signup'])){
    
            $first_name = $_POST['f_name'];
            $last_name = $_POST['l_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $conform_psd = $_POST['confirm_password'];

            if ($password != $conform_psd) {
                $password_match = false;
            }
            if (strlen($password) < 5) {
                $length_check = false;
            }

            $check = mysqli_num_rows(mysqli_query($conn, "select * from users where email_id='$email'"));
            if($check>0){
                $mail_exist = true;
            }
            else if(!$password_match && !$length_check){
        
                $query = "INSERT INTO users(role_id, firstname, lastname, email_id, password, isemailverified, createddate, isactive) VALUES(1, '$first_name', '$last_name', '$email', '$password', 0, NOW(), 1)";
                $result = mysqli_query($conn, $query);
                $id= mysqli_insert_id($conn);
        
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
        
            $mail->addAddress($email, $first_name);  // This email is where you want to send the email
            $mail->addReplyTo($config_email, 'kashish');  // If receiver replies to the email, it will be sent to this email address
            $mail->AddEmbeddedImage('img/pre-login/logo.png', 'logo_2u');   
         
            // Setting the email content
            $mail->IsHTML(true);  // You can set it to false if you want to send raw text in the body
            $mail->Subject = "Send email using Gmail SMTP and PHPMailer";       //subject line of email
            
            
            $mail->Body = "
            <table>
                    <tr>
                        <td style='height: 80px;'><img src='cid:logo_2u' alt='logo'></td>
                    </tr>
                    <tr>
                        <td style='color: #6255a5;font-size:26px;  font-weight: 600; line-height: 30px; height: 50px;'>Email Verification</td>
                    </tr>
                    <tr>
                        <td style='height: 30px;font-size: 18px;color: #333333;font-weight: 400;'><b>Dear $first_name $last_name,</b></td>
                    </tr>
                    <tr>
                        <td style='font-size: 16px;color: #333333;font-weight: 400;height: 30px;'>Thanks for signing up</td>
                    </tr>
                    <tr>
                        <td style='font-size: 16px;color: #333333;font-weight: 400;height: 25px;'>Simply click below for email verification.</td>
                    </tr>
                    <tr>
                        <td style='height: 60px;'><a href='http://localhost/notes-project/Notes/check.php?userid=$id'><button style='width: 300px;background-color: #6255a5;height: 50px;border-radius: 3px;font-size: 18px;color: #fff;line-height: 22px; border:transparent;text-transform: uppercase;'>verify email address</button></a></td>
                    </tr>
                </table>
                
            ";
            //Email body
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
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<!--body-->

<body>

    <!--signup section-->
    <section id="login">
        <div class="container-fluid">
        
            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-10 logo-login-1">
                    <div id="logo" class="text-center logo-login">
                        <img src="img/pre-login/top-logo.png">
                    </div>
                    <form action="signup.php" method="POST" class="white-bg-signup">
                        <h3 id="login-page-signup">Create an Account</h3>
                        <p>Enter your details to signup</p>
                                   <?php
                                    if ($mail_sent)
                                        echo "<span> Your account has been successfully created</span>";
                                    ?>
                        
                        <div class="form-group signup-label">
                            <label for="fname">First Name<span class="required">*</span></label>
                            <input type="text" name="f_name" class="form-control form-control-sm" id="fname" placeholder="Enter your first name" required>
                        </div>
                        
                        <div class="form-group signup-label">
                            <label for="lname">Last Name<span class="required">*</span></label>
                            <input type="text" name="l_name" class="form-control form-control-sm" id="lname" placeholder="Enter your last name" required>
                        </div>

                        <div class="form-group signup-label">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" name="email" class="form-control form-control-sm" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        
                        <?php
                        if ($mail_exist) {
                            echo "<h6 class='correct-email'>" . $message . "</h6>";
                        }
                        
                        ?>
                        </div>

                        <div class="form-group signup-label">
                            <label for="password" class="pass">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id="password" placeholder="Password" required>
                            <div class="correct-email">
                                        <?php
                                        if (!$password_match)
                                            echo "The Password doesn't match!";
                                        else if (!$length_check) {
                                            echo "The Password Length Should be more then 6 characters";
                                        }
                                        ?>
                            </div>

                        </div>
                        
                        <div class="form-group signup-label">
                            <label for="conpassword" class="pass">Confirm password</label>
                            <input type="password" name="confirm_password" class="form-control form-control-sm" id="conpassword" placeholder="Re-enter your passsword" required>
                        </div>

                        <button type="submit" name="signup" class="btn btn-block signup-btn">SIGNUP</button>
                        
                        <div class="already-signup">
                            Already have an account?
                            <a href="#">Login</a>
                        </div>
                        
                    </form>

                </div>
                <div class="col-lg-4 col-md-3 col-sm-3 col-1"></div>
            </div>
            

        </div>
    </section>
    
    

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

</body>

</html>