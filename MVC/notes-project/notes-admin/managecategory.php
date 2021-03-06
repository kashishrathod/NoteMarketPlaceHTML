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
        <section id="administrator">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 general">
                        <h2>Manage Category</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-5 col-12 general">
                        <button class="btn btn-primary administrator-btn">ADD CATEGORY</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                        <button class="btn btn-primary administrator-search">Search</button>
                        <input type="text" placeholder=' &#xF002;  Search' />
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table text-center border general-table-width">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">COUNTRY NAME</th>
                                    <th scope="col">COUNTRY CODE</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">ADDED BY</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>science</td>
                                    <td>11</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khayati Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="img/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="img/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>computer</td>
                                    <td>11</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khayati Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="img/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="img/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>IT</td>
                                    <td>11</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khayati Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="img/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="img/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>account</td>
                                    <td>11</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khayati Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="img/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="img/administrator/delete.png" alt="delete">
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>history</td>
                                    <td>11</td>
                                    <td>09-10-2020,10:10</td>
                                    <td>Khayati Patel</td>
                                    <td>yes</td>
                                    <td>
                                        <img src="img/administrator/edit.png" alt="edit">&nbsp;
                                        <img src="img/administrator/delete.png" alt="delete">
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

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>