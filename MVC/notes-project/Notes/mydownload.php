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


     <?php include "nav.php"; ?>

    <section id="mydownload">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                    <h4>My Downloads</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-8 col-12">
                    <button class="btn">Search</button>
                    <input type="text" placeholder='  &#xf002;  Search' />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table text-center border general-table-width mydownload-notes-table">
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
                                <tr>
                                    <td>1</td>
                                    <td>Data Science</td>
                                    <td>Science</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Paid</td>
                                    <td>$250</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Account</td>
                                    <td>Commerce</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Social Studies</td>
                                    <td>Social</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Paid</td>
                                    <td>$555</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Paid</td>
                                    <td>$158</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Lorem dusaacn gdhdc</td>
                                    <td>Lorem</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                   <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Data Science</td>
                                    <td>Data</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Lorem dusaacn gdhdc</td>
                                    <td>Lorem</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Paid</td>
                                    <td>$123</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>AI</td>
                                    <td>IT</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Free</td>
                                    <td>$0</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Lorem dusaacn gdhdc</td>
                                    <td>Lorem</td>
                                    <td>testing123@gmail.com</td>
                                    <td>Paid</td>
                                    <td>$145</td>
                                    <td>27 NOV 2020, 11:24:34</td>
                                    <td>
                                        <div class="display-block">
                                            <img src="img/dashboard/eye.png" alt="delete" class="eye-img">

                                            <div class="dropdown dropleft drop-border">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/Dashboard/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="#">Download Notes</a>
                                                    <a role="button" class="btn add-padding" data-toggle="modal" data-target="#exampleModal">Add Reviews/Feedback</a>
                                                    <a class="dropdown-item" href="#">Report as Inappropriate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <span class="page-link">❮</span>
                            </li>

                            <li class="page-item active">
                                <span class="page-link">
                                    1
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">❯</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content popup-padding">
               <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                
                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                    
                
                <div class="modal-body general">
                    <div class="rate addreview-popup-star">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
                   
                    <label style="margin-top: 80px">Comment <span class="required">*</span></label>
                    <input type="text">
                    <button type="button" class="btn btn-primary btn-popup">SUBMIT</button>
                
            </div>
        </div>
    </div>

    <!--footer-->

    <?php include "footer.php"; ?>

    <script src="js/popper.min.js"></script>
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>


    <script src="js/script.js"></script>
</body>

</html>