<html>

<head>
    <!--meta tages-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
    <meta charset="UTF-8">
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


    <section id="searchnote">
        <div class="content-box-lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="search-statement" class="text-center">
                            <h3>Search Notes</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="notefilter">
        <div class="container">
            <div class="row">
                <h4>search and filter notes</h4>
            </div>
        </div>

        <div class="container gray-color">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <input type="text" placeholder='  &#xf002   Search Notes here...' />
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control dropdown arrow-down">
                        <option selected>Select Type</option>
                        <option>Free</option>
                        <option>Paid</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control dropdown arrow-down">
                        <option selected>Select Category</option>
                        <option>..</option>
                        <option>..</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control dropdown arrow-down">
                        <option selected>Select University</option>
                        <option>GTU</option>
                        <option>GU</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control dropdown arrow-down">
                        <option selected>Select Course</option>
                        <option>computer science</option>
                        <option>Physics</option>
                        <option>Mathematics</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control dropdown arrow-down">
                        <option selected>Select Country</option>
                        <option>India</option>
                        <option>USA</option>
                        <option>Africa</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                    <select class="form-control dropdown arrow-down">
                        <option selected>Select Rating</option>
                        <option>5</option>
                        <option>4</option>
                        <option>3</option>
                        <option>2</option>
                        <option>1</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <section id="totalnotes">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Total 18 notes</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">

                    <!-- first book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/1.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate">
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
                        <h6>123 reviews</h6>
                    </div>
                </a>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- second book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/4.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Science Illuminated - Seventh Edition
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate1">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
</div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- third book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/1.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Computer Operating System - Final Exam With Paper Solution
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate2">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
</div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- first book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/2.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5 class="computer-min-height">
                                    Computer Science
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate3">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
</div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- second book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/5.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    The Principle Of Computer Hardware - Oxford
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate4">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- third book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/2.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5 class="computer-min-height">
                                    Computer Science
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate5">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- first book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/3.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Basic Computer Engineering Tech India Publication Series
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate6">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
</div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <!-- second book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/6.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Basic Computer Engineering Tech India Publication Serie
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate7">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>  
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                     <!-- third book-->
                    <a href="notedetails.php" style="text-decoration:none;">
                    <img src="img/Search/3.jpg" alt="Book" class="img-fluid">
                    <div class="image-info">
                        <ul>
                            <li>
                                <h5>
                                    Basic Computer Engineering Tech India Publication Series
                                </h5>
                            </li>
                        </ul>
                        <div class="result">
                            <img src="img/Search/university.png" alt="university">
                            <h6 class="result-data">University of California, US</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/pages.png" alt="book">
                            <h6 class="result-data">204 Pages</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/calendar.png" alt="calendar">
                            <h6 class="result-data">Thu, Nov 26 2020</h6>
                        </div>
                        <div class="result">
                            <img src="img/Search/flag.png" alt="flag">
                            <h6 class="result-red">5 Users have marked this note as
                                inappropriate</h6>
                        </div>
                        <div class="search-result-rating">
                            <div class="rate8">
                                <div class="rate"></div>
                            </div>
                        </div>
                        <h6>123 reviews</h6>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </section>
    
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
    
    <!--footer-->

    <?php include "footer.php"; ?>


    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    
    
    <script src="js/script.js"></script>
</body>

</html>