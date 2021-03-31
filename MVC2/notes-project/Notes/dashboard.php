<?php include "db_connection.php";
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "select userid from users where email_id='$email'";
    $userid = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($userid)) {
        $user = $row['userid'];
    }
}

if (isset($_POST['search'])) {

    $search_result = $_POST['search_result'];
    $result_db = mysqli_query($conn, "SELECT COUNT(seller_note_id) FROM seller_notes WHERE note_title LIKE '%$search_result%' AND isactive=1");

    $query = "SELECT seller_notes.seller_note_id, seller_notes.publisheddate ,seller_notes.note_title,
    note_categories.category_name, reference_data.ref_value FROM seller_notes LEFT JOIN note_categories
    ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data ON
    seller_notes.status=reference_data.reference_id where (seller_notes.note_title LIKE '%$search_result%'
    OR note_categories.category_name LIKE '%$search_result%' OR seller_notes.publisheddate LIKE '%$search_result%'
    OR reference_data.ref_value LIKE '%$search_result%' OR seller_notes.publisheddate LIKE '%$search_result%') AND reference_data.reference_id IN (6,7,8) AND seller_notes.isactive=1 AND seller_id=$user";

    $result = mysqli_query($conn, $query);
} else {
    $result_db = mysqli_query($conn, "SELECT COUNT(seller_note_id) FROM seller_notes WHERE isactive=1");

    $query = "SELECT seller_notes.seller_note_id, seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.status=reference_data.reference_id WHERE reference_data.reference_id IN (6,7,8) AND seller_notes.isactive=1 AND seller_id=$user";
    $result = mysqli_query($conn, $query);
}


if (isset($_POST['publish'])) {

    $publish_result = $_POST['publish_result'];
    $result_db2 = mysqli_query($conn, "SELECT COUNT(seller_note_id) FROM seller_notes where note_title LIKE '%$publish_result%' AND seller_notes.status=9");

    $query2 = "SELECT seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value, seller_notes.selling_price
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.ispaid =reference_data.reference_id WHERE (seller_notes.note_title LIKE '%$publish_result%' OR note_categories.category_name LIKE '%$publish_result%'
    OR seller_notes.selling_price LIKE '%$publish_result%' OR reference_data.ref_value LIKE '%$publish_result%' OR seller_notes.publisheddate LIKE '%$publish_result%') AND seller_notes.status=9 AND seller_id=$user";

    $result2 = mysqli_query($conn, $query2);
} else {
    $result_db2 = mysqli_query($conn, "SELECT COUNT(seller_note_id) FROM seller_notes WHERE status=9");

    $query2 = "SELECT seller_notes.publisheddate ,seller_notes.note_title, note_categories.category_name, reference_data.ref_value, seller_notes.selling_price
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.ispaid =reference_data.reference_id WHERE seller_notes.status=9 AND seller_id=$user";
    $result2 = mysqli_query($conn, $query2);
}


?>

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
    <link rel="stylesheet" type="text/css" href="css\jquery.dataTables.css">
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
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <a href="addnotes.php"><button class="btn btn-primary">ADD NOTE</button></a>
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


                            <div class="col-lg-4 second-border text-center">
                                <?php
                                $query_sold = mysqli_query($conn, "SELECT * FROM downloads WHERE seller=$user AND allow_download=1 AND ispaid=1");
                                $count_sold = mysqli_num_rows($query_sold);
                                ?>
                                <h5><?php echo $count_sold; ?></h5>
                                <p>Number of notes sold</p>
                            </div>


                            <div class="col-lg-5 third-border text-center">
                                <?php
                                $query_earning = mysqli_query($conn, "SELECT SUM(selling_price) FROM seller_notes WHERE seller_id=$user AND ispaid=1 AND status=10");
                                while ($row = mysqli_fetch_assoc($query_earning)) {
                                    $price = $row['SUM(selling_price)'];
                                }
                                ?>
                                <h5>$<?php echo $price; ?></h5>
                                <p>Money Earning</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-md-4 col-12 text-center common-border">
                            <?php
                            $query_download = mysqli_query($conn, "SELECT * FROM downloads WHERE downloader=$user AND allow_download=1");
                            $count_download = mysqli_num_rows($query_download);
                            ?>
                            <h5><?php echo $count_download; ?></h5>
                            <p>My Downloads</p>
                        </div>
                        <div class="col-md-4 col-12 text-center common-border">
                            <?php
                            $query_reject = mysqli_query($conn, "SELECT * FROM seller_notes WHERE status=10 AND seller_id=$user");
                            $count_reject = mysqli_num_rows($query_reject);

                            ?>
                            <h5><?php echo $count_reject; ?></h5>
                            <p>My Rejected Notes</p>
                        </div>
                        <div class="col-md-4 col-12 text-center common-border">
                            <?php
                            $query_buyer = mysqli_query($conn, "SELECT DISTINCT note_id FROM downloads WHERE allow_download=0 AND seller=$user AND ispaid=1");
                            $count_buyer = mysqli_num_rows($query_buyer);

                            ?>
                            <h5><?php echo $count_buyer; ?></h5>
                            <p>Buyer Requests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboard-table">
        <div class="container">

            <div>
                <table id="myTable" class="table border dashboard-width">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-12 dash-space">
                            <h4>In Progress Notes</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                            <form action="" method="POST">
                                <button type="submit" class="btn" name="search">Search</button>
                                <label><input type="search" class="form-control" aria-controls="myTable" name="search_result" placeholder='  &#xf002;  Search' /></label>
                            </form>
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th scope="col">ADDED DATE</th>
                            <th scope="col">TITLE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($row = mysqli_fetch_assoc($result)) {
                            $seller_note_id  = $row['seller_note_id'];
                            $date = $row['publisheddate'];
                            $note_title = $row['note_title'];
                            $category_name = $row['category_name'];
                            $ref_value = $row['ref_value'];

                            echo "<tr>
                                <td>$date</td>
                                <td><a style='text-decoration: none; color:#6255a5;' href='notedetails.php?id=$seller_note_id'>$note_title</a></td>
                                <td>$category_name</td>
                                <td>$ref_value</td>";

                            if ($ref_value == 'Draft') {
                                echo "<td>
                                     <a href='http://localhost/notes-project/Notes/addnotes.php?id=$seller_note_id'><img src='img/dashboard/edit.png' alt='edit'></a>
                                     <a href='http://localhost/notes-project/Notes/delete.php?act=edit&id=$seller_note_id'><img src='img/dashboard/delete.png' alt='delete'></a>
                                     </td>";
                            } else {
                                echo "<td>
                                        <a href='notedetails.php?id=$seller_note_id'><img src='img/dashboard/eye.png' alt='eye'></a>
                                        </td>";
                            }
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="dashboard-table">
        <div class="container">


            <div>
                <table id="myPublish" class="table border dashboard-width">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-5 col-12">
                            <h4>Published Notes</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                            <form action="dashboard.php" method="POST">
                                <button type="submit" class="btn" name="publish">Search</button>
                                <label><input type="search" class="form-control" aria-controls="myPublish" name="publish_result" placeholder='  &#xf002;  Search' /></label>
                            </form>
                        </div>
                    </div>
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

                        <?php

                        while ($row = mysqli_fetch_assoc($result2)) {

                            $date = $row['publisheddate'];
                            $note_title = $row['note_title'];
                            $category_name = $row['category_name'];
                            $ref_value = $row['ref_value'];
                            $selling_price = $row['selling_price'];


                            echo "<tr>
                                <td>$date</td>
                                <td><a style='text-decoration: none; color:#6255a5;' href='notedetails.php?id=$seller_note_id'>$note_title</a></td>
                                <td>$category_name</td>
                                <td>$ref_value</td>
                                <td>$selling_price</td>
                                        <td>
                                        <a href='notedetails.php?id=$seller_note_id'><img src='img/dashboard/eye.png' alt='eye'></a>
                                   
                                        </td>";

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <!--footer-->
    <?php include "footer.php"; ?>

    <script src="js/popper.min.js"></script>

    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>

    <script src="js/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "scrollX": true
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myPublish').DataTable({
                "scrollX": true
            });

        });
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>
