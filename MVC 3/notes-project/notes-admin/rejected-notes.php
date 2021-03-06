<?php include "admin_db.php";
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query_userid = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
    while ($row = mysqli_fetch_assoc($query_userid)) {
        $userid = $row['userid'];
    }
}

if (isset($_GET['id'])) {
    $id1 = $_GET['id'];
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $query_attch = mysqli_query($conn, "SELECT * FROM seller_notes_attachments WHERE note_id = $id1");
    while ($row = mysqli_fetch_assoc($query_attch)) {
        $path = $row['file_path'];
        $zip->addFile($path);
    }
    $zip->close();
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $zipname);
    header('Content-Length: ' . filesize($zipname));
    readfile($zipname);
}

if (isset($_POST['approve-yes'])) {

    $approve_note_id = $_POST['publish-hidden'];
    $query_approve = mysqli_query($conn, "UPDATE seller_notes SET status = 9, actionby=$userid WHERE seller_note_id = $approve_note_id");
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
    <link rel="shortcut icon" href="img/login-img/favicon.ico">
    <!--font awesome-->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        function reject() {
            var reject_search = $("#reject_search").val();
            var seller = $("#seller").val();
            $.ajax({
                type: "GET",
                url: "AJAX/reject-ajax.php",
                data: {
                    reject_data: reject_search,
                    seller_data: seller
                },
                success: function(data) {
                    $("#ajax-reject").html(data);
                }
            });
        }

        $(document).ready(function() {
            reject();
        });
    </script>
</head>

<body>

    <?php include "nav-admin.php" ?>
    <div class="general-height">
        <section id="published-notes">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 general">
                        <h3>Rejected Notes</h3>
                        <p>Seller</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-7 general">
                        <div class="form-group">
                            <select id="seller" onchange="reject();" class="form-control arrow-down">
                            <option value="" selected disabled>Select Seller</option>
                                <?php
                                $query_seller = mysqli_query($conn, "SELECT DISTINCT seller_notes.seller_id, users.firstname,
                                users.lastname FROM seller_notes LEFT JOIN users ON seller_notes.seller_id=users.userid WHERE
                                seller_notes.status=10");
                                while ($row = mysqli_fetch_assoc($query_seller)) {
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $seller_id = $row['seller_id'];
                                    echo "<option value='$seller_id'>$firstname $lastname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-0 col-0"></div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <button class="btn btn-primary publish-search" onclick="reject();">Search</button>
                        <input type="search" id="reject_search" placeholder=' &#xF002;  Search' />
                    </div>
                </div>
                <div id="ajax-reject"></div>
            </div>
        </section>
    </div>
    <!--footer-->
    <?php include "footer-admin.php" ?>
    <!--footer end-->

    <!--popper file-->
    <script src="js/popper.min.js"></script>

    <!-- datatable -->
    <script src="js/datatables.min.js"></script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>