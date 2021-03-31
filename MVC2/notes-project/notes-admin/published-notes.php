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
                            <select id="seller" class="form-control arrow-down">
                                <option selected>khyati</option>
                                <option>Rahul</option>
                                <option>Raj</option>
                                <option>Ashish</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-0 col-0"></div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <button class="btn btn-primary publish-search">Search</button>
                        <input type="text" placeholder=' &#xF002;  Search' />
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table text-center border publish-table-width published-note-table">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">SELL TYPE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">SELLER</th>
                                    <th scope="col"></th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th scope="col">APPROVED BY</th>
                                    <th scope="col">NUMBER OF DOWNLOADS</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Paid</td>
                                    <td>$145</td>
                                    <td>Rahul shah</td>
                                    <td><img src="img/login-img/eye.png" alt="eye"></td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Raj Sheth</td>
                                    <td>75</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Computer science</td>
                                    <td>CE</td>
                                    <td>Paid</td>
                                    <td>$178</td>
                                    <td>Khyati patel</td>
                                    <td><img src="img/login-img/eye.png" alt="eye"></td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Raj Sheth</td>
                                    <td>75</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>World war 2</td>
                                    <td>history</td>
                                    <td>Paid</td>
                                    <td>$175</td>
                                    <td>harsh shah</td>
                                    <td><img src="img/login-img/eye.png" alt="eye"></td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Rakesh Sheth</td>
                                    <td>75</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Software Development</td>
                                    <td>IT</td>
                                    <td>Paid</td>
                                    <td>$145</td>
                                    <td>Rahul shah</td>
                                    <td><img src="img/login-img/eye.png" alt="eye"></td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Raj Sheth</td>
                                    <td>75</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Software Development</td>
                                    <td>Data Science</td>
                                    <td>Paid</td>
                                    <td>$200</td>
                                    <td>ketan patel</td>
                                    <td><img src="img/login-img/eye.png" alt="eye"></td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Raj Sheth</td>
                                    <td>75</td>
                                    <td>
                                        <div class="dropdown dropleft">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="img/administrator/dots.png" alt="">
                                            </a>
                                            <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Download Notes</a>
                                                <a class="dropdown-item" href="#">View More Details</a>
                                                <a class="dropdown-item" href="#">Unpublish</a>
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