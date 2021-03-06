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
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>

     <?php include "nav-admin.php"?>

    <section id="member-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Member Details</h3>
                </div>
            </div>
            <div class="row member-border-bottom">

                <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                    <img src="img/member-details/member.png" alt="member">
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-12">
                    <div class="row right-border-member">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6">
                            <h4 class="member-font-1">First Name:</h4>
                            <h4 class="member-font-1">Last Name:</h4>
                            <h4 class="member-font-1">Email:</h4>
                            <h4 class="member-font-1">DOB:</h4>
                            <h4 class="member-font-1">Phone Number:</h4>
                            <h4 class="member-font-1">College/University:</h4>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                            <h4 class="member-font-2">Richard</h4>
                            <h4 class="member-font-2">Brown</h4>
                            <h4 class="member-font-2">rbrown12@gmail.com</h4>
                            <h4 class="member-font-2">13-08-1990</h4>
                            <h4 class="member-font-2">9876544916</h4>
                            <h4 class="member-font-2">University of California</h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6">
                            <h4 class="member-font-1">Address 1:</h4>
                            <h4 class="member-font-1">Address 2:</h4>
                            <h4 class="member-font-1">City:</h4>
                            <h4 class="member-font-1">State:</h4>
                            <h4 class="member-font-1">Country:</h4>
                            <h4 class="member-font-1">Zip Code:</h4>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                            <h4 class="member-font-2">144-Diamond Height</h4>
                            <h4 class="member-font-2">Star Colony</h4>
                            <h4 class="member-font-2">New York</h4>
                            <h4 class="member-font-2">New York State</h4>
                            <h4 class="member-font-2">United State</h4>
                            <h4 class="member-font-2">11004-05</h4>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <div class="general-height">
        <section id="member-details-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="member-notes">Notes</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table text-center border notes-table-width member-note-table">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE </th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">DOWNLOADED NOTES</th>
                                    <th scope="col">TOTAL EARNINGS</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Development</td>
                                    <td>CE</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Human Body</td>
                                    <td>Science</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Account</td>
                                    <td>Commerce</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Published</td>
                                    <td>22</td>
                                    <td>$177</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>

                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row pagination-up">
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
    </div>

    <!--footer-->
   
    <?php include "footer-admin.php"?>
    <!--footer end-->
    <!--popper file-->
    <script src="js/popper.min.js"></script>

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>