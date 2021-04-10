<?php include "admin_db.php";
session_start();

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
if (isset($_GET['memberid'])) {
    $memberid = $_GET['memberid'];
} else {
    $memberid = "";
}

if (isset($_GET['noteid'])) {
    $noteid = $_GET['noteid'];
} else {
    $noteid = "";
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
    <!-- datatable -->
    <link rel="stylesheet" href="css/jquery.dataTables.css">
    <!--custom css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!--custom jquery-->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        function download() {
            var download_search = $("#download_search").val();
            var seller = $("#seller").val();
            var note = $("#note").val();
            var buyer = $("#buyer").val();
            var member = '<?php echo $memberid ?>'
            var note_1 = '<?php echo $noteid ?>'
            $.ajax({
                type: "GET",
                url: "AJAX/download-note-ajax.php",
                data: {
                    download_search_data: download_search,
                    note_data: note,
                    seller_data: seller,
                    buyer_data: buyer,
                    member_data: member,
                    note_data_1: note_1
                },
                success: function(data) {
                    $("#download-ajax").html(data);
                }
            });
        }

        $(document).ready(function() {
            download();
        });
    </script>
</head>

<body>
    <?php include "nav-admin.php" ?>
    <div class="general-height">
        <section id="published-notes">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 general">
                        <h3>Downloaded Notes</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="note">Note</label>
                            <select id="note" class="form-control arrow-down" onchange="download();">
                                <option value="" selected disabled>Select Note</option>
                                <?php
                                $query_note = mysqli_query($conn, "SELECT DISTINCT note_title FROM downloads WHERE allow_download=1");
                                while ($row = mysqli_fetch_assoc($query_note)) {
                                    $note_title = $row['note_title'];
                                    echo "<option value='$note_title'>$note_title</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="seller">Seller</label>
                            <select id="seller" class="form-control arrow-down" onchange="download();">
                                <option value="" selected disabled>Select Seller</option>
                                <?php
                                $query_seller = mysqli_query($conn, "SELECT DISTINCT downloads.seller,
                                users.firstname, users.lastname FROM downloads LEFT JOIN
                                users ON downloads.seller=users.userid WHERE allow_download=1");
                                while ($row = mysqli_fetch_assoc($query_seller)) {
                                    $seller = $row['seller'];
                                    $lastname = $row['lastname'];
                                    $firstname = $row['firstname'];
                                    echo "<option value='$seller'>$firstname $lastname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="buyer">Buyer</label>
                            <select id="buyer" class="form-control arrow-down" onchange="download();">
                                <option value="" selected disabled>Select Buyer</option>
                                <?php
                                $query_buyer = mysqli_query($conn, "SELECT DISTINCT downloads.downloader,
                                users.firstname, users.lastname FROM downloads LEFT JOIN
                                users ON downloads.downloader=users.userid WHERE allow_download=1");
                                while ($row = mysqli_fetch_assoc($query_buyer)) {
                                    $downloader = $row['downloader'];
                                    $lastname = $row['lastname'];
                                    $firstname = $row['firstname'];
                                    echo "<option value='$downloader'>$firstname $lastname</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 general"><br>
                        <button type="submit" class="btn btn-primary publish-search" onclick="download();">Search</button>
                        <input type="search" id="download_search" placeholder=' &#xF002;  Search' />
                    </div>
                </div>
                <div id="download-ajax"></div>
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