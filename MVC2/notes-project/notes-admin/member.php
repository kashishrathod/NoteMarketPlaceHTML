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


    <div class="general-height">
        <section id="member">
            <div class="container">
                <div class="row member-padding">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <h2>Members</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <button class="btn btn-primary member-btn">Search</button>
                        <input type="text" placeholder=' &#xF002;  Search' />
                    </div>
                </div>



                <div class="row">
                    <div class="table-responsive">
                        <table class="table text-center border member-table-width">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">JOINING DATE</th>
                                    <th scope="col">UNDER REVIEW NOTES</th>
                                    <th scope="col">PUBLISHED NOTES</th>
                                    <th scope="col">DOWNLOADED NOTE</th>
                                    <th scope="col">TOTAL EXPENSIS</th>
                                    <th scope="col">TOTAL EARNING</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Khyati</td>
                                    <td>Patel</td>
                                    <td>khyatipatel@gmail.com</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>19</td>
                                    <td>10</td>
                                    <td>22</td>
                                    <td>$220</td>
                                    <td>$117</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dot">
                                            </a>


                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Deactivate</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Raj</td>
                                    <td>vaghela</td>
                                    <td>rajvaghela@gmail.com</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>20</td>
                                    <td>10</td>
                                    <td>21</td>
                                    <td>$250</td>
                                    <td>$109</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dot">
                                            </a>


                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Deactivate</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Khushi</td>
                                    <td>Patel</td>
                                    <td>khushipatel@gmail.com</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>29</td>
                                    <td>15</td>
                                    <td>22</td>
                                    <td>$230</td>
                                    <td>$117</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dot">
                                            </a>


                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Deactivate</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Khyati</td>
                                    <td>Patel</td>
                                    <td>khyatipatel@gmail.com</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>19</td>
                                    <td>10</td>
                                    <td>22</td>
                                    <td>$220</td>
                                    <td>$117</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dot">
                                            </a>


                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Deactivate</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>rahul</td>
                                    <td>Shah</td>
                                    <td>rahulshah@gmail.com</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>19</td>
                                    <td>10</td>
                                    <td>22</td>
                                    <td>$220</td>
                                    <td>$117</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="dot">
                                            </a>


                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Deactivate</a>

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