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
    $reject = $_POST['reject'];
    $query_reject = mysqli_query($conn, "SELECT seller_notes.note_title, seller_notes.seller_note_id, note_categories.category_name, seller_notes.admin_remark 
    FROM seller_notes LEFT JOIN note_categories ON seller_notes.category = note_categories.note_categories_id WHERE seller_notes.status=10 AND seller_id=$user AND seller_notes.note_title LIKE '%$reject%'");
} else {
    $query_reject = mysqli_query($conn, "SELECT seller_notes.note_title, seller_notes.seller_note_id, note_categories.category_name, seller_notes.admin_remark 
FROM seller_notes LEFT JOIN note_categories ON seller_notes.category = note_categories.note_categories_id WHERE seller_notes.status=10 AND seller_id=$user");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $query_attch = mysqli_query($conn, "SELECT * FROM seller_notes_attachments WHERE note_id = $id");
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

    <?php include "nav.php"; ?>


    <section id="mydownload">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div>
                        <table id="myTable" class="table border reject-width">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-4 col-12">
                                    <h4>My Rejected Notes</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-8 col-12">
                                    <form method="POST">
                                        <button type="submit" class="btn" name="search">Search</button>
                                        <label><input type="search" class="form-control" aria-controls="myTable" name="reject" placeholder='  &#xf002;  Search' /></label>
                                    </form>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">REMARKS</th>
                                    <th scope="col">CLONE</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($query_reject)) {
                                    $title = $row['note_title'];
                                    $category = $row['category_name'];
                                    $remark = $row['admin_remark'];
                                    $noteid = $row['seller_note_id'];

                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo $category; ?></td>
                                        <td><?php echo $remark; ?></td>
                                        <td>clone</td>
                                        <td>
                                            <div class="display-block">

                                                <div class="dropdown dropleft drop-border">
                                                    <a class="btn" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <img src="img/Dashboard/dots.png" alt="">
                                                    </a>
                                                    <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                        <?php echo "<a class='dropdown-item' href='http://localhost/notes-project/Notes/rejectednotes.php?id=$noteid'>Download Note</a>";  ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--footer-->

    <?php include "footer.php"; ?>

    <!--popper-->
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

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>