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
    <!--fontawesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>


<body>
<?php include "nav.php"; ?>

    <section id="userprofile">
       <div class="content-box-lg">
           <div class="container">
               <div class="row">
                   <div class="col-md-12">
                       <div id="statement" class="text-center">
                           <h3>User Profile</h3>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </section>
    
    <section id="userdetails">
    <div class="container">
       <div class="row">
           <div class="col-md-12">
              <h3>Basic Profile Details</h3> 
           </div>
       </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                
                <div class="form-group">
                    <label for="fname">First Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter your first name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email<span class="required">*</span></label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email address" required>
                </div>
                <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control arrow-down">
                    <option selected>select your gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                </div>
                <div class="form-group">
                    <label>Display Picture</label>
                    <div class="displaypicture">
                        <label for="file-input">
                            <img src="img/Add-notes/upload-file.png">
                        </label>
                        <input id="file-input" type="file">
                    </div>
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <label for="lname">Last Name<span class="required">*</span></label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter your last name" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" class="form-control" id="dob" placeholder="Enter your date of birth">
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-5 col-5 form-group">
                        <label for="phoneno">Phone No.</label>
                        <select id="phoneno" class="form-control arrow-down">
                            <option selected>+91</option>
                            <option>+44</option>
                            <option>+66</option>
                            <option>+88</option>
                        </select>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-7 col-7 form-group">
                        <div class="form-group phonenumber">
                            <label for="phone"><br></label>
                            <input type="tel" class="form-control" id="phone" placeholder="phone no.">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <section id="userdetails1">
    <div class="container">
       <div class="row">
           <div class="col-md-12">
              <h3>Address Details</h3> 
           </div>
       </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                
                <div class="form-group">
                    <label for="address1">Address Line 1<span class="required">*</span></label>
                    <input type="text" class="form-control" id="address1" placeholder="Enter your address" required>
                </div>
                <div class="form-group">
                    <label for="city">City<span class="required">*</span></label>
                    <input type="text" class="form-control" id="city" aria-describedby="emailHelp" placeholder="Enter your city" required>
                </div>
                <div class="form-group">
                    <label for="zcode">ZipCode<span class="required">*</span></label>
                    <input type="text" class="form-control" id="zcode" aria-describedby="emailHelp" placeholder="Enter your zipcode" required>
                </div>
                
                
                </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control" id="address2" placeholder="Enter your address">
                </div>
                <div class="form-group">
                    <label for="state">State<span class="required">*</span></label>
                    <input type="text" class="form-control" id="state" placeholder="Enter your state">
                </div>
                <div class="form-group">
                    <label for="country">Country<span class="required">*</span></label>
                    <input type="text" class="form-control" id="country" placeholder="Enter your state">
                </div>
                
            </div>
        </div>
    </div>
    </section>
    
    <section id="userdetails2">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <h3>University and College Information</h3> 
               </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="university">University</label>
                    <input type="text" class="form-control" id="university" placeholder="Enter your University">
                </div>
                
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                    <label for="college">College</label>
                    <input type="text" class="form-control" id="college" placeholder="Enter your college">
                </div>
                </div>
                <div class="col-md-12">
                <button type="submit" class="btn btn-primary button-width">SUBMIT</button>
                </div>
            </div>
        </div>
    </section>
    
    
    <!--footer-->

   <?php include "footer.php"; ?>
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>