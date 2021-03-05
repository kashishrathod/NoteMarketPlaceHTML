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
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3>Dashboard</h3>
                </div>
                
            </div>

            <div class="row">
                <div class="col-lg-7 col-md-12 col-12">
                    <div class="con-border">
                        <div class="row">

                            <div class="col-lg-3 first-border">
                                <img src="img/dashboard/earning-icon.svg" alt="earning">
                                <h5>My Earning</h5>
                            </div>


                            <div class="col-lg-4 second-border text-center" style="border-right: 1px solid #d1d1d1">
                                <h5>100</h5>
                                <p>Number of notes sold</p>
                            </div>


                            <div class="col-lg-5 third-border text-center" style="border-left: 1px solid #d1d1d1">
                                <h5>$10,00,000</h5>
                                <p>Money Earning</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    
                </div>
            </div>
        </div>

    </section>

    <section class="dashboard-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-12 dash-space general">
                    <h4>In Progress Notes</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                    <button class="btn">Search</button>
                    <input type="text" placeholder='  &#xf002;  Search' />
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table border general-table-width">
                            <tr>
                                <th scope="col">ADDED DATE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                       
                            <tr>

                                <td>9-10-2020</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>Draft</td>
                                <td>
                                    <img src="img/dashboard/edit.png" alt="edit">
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>10-10-2020</td>
                                <td>Account</td>
                                <td>Commerce</td>
                                <td>In Review</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>11-10-2020</td>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>Submitted</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>12-10-2020</td>
                                <td>AI</td>
                                <td>IT</td>
                                <td>Submitted</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>13-10-2020</td>
                                <td>Lorem dusaacn gdhdc</td>
                                <td>Lorem</td>
                                <td>Draft</td>
                                <td>
                                    <img src="img/dashboard/edit.png" alt="edit">
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                        
                    </table>
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
    
    <section class="dashboard-table">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-5 col-12 general">
                    <h4>Published Notes</h4>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                    <button class="btn">Search</button>
                    <input type="text" placeholder='  &#xf002;  Search' />
                </div>
            </div>
            <div class="row">
                    <div class="table-responsive">
                    <table class="table border general-table-width">
                        <thead>
                            <tr>
                                <th scope="col">ADDED DATE</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">SELL TYPE</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>9-10-2020</td>
                                <td>Data Science</td>
                                <td>Science</td>
                                <td>Paid</td>
                                <td>$575</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>10-10-2020</td>
                                <td>Account</td>
                                <td>Commerce</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>11-10-2020</td>
                                <td>Social Studies</td>
                                <td>Social</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>12-10-2020</td>
                                <td>AI</td>
                                <td>IT</td>
                                <td>Paid</td>
                                <td>$3532</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                            <tr>
                                <td>13-10-2020</td>
                                <td>Lorem dusaacn gdhdc</td>
                                <td>Lorem</td>
                                <td>Free</td>
                                <td>$0</td>
                                <td>
                                    <img src="img/dashboard/eye.png" alt="delete">
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    
    <!--footer-->
    
    <?php include "footer.php"; ?>
    
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

</body>

</html>