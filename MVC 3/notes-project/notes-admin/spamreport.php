<?php include "admin_db.php";
session_start();

if (isset($_POST['spam_search'])) {
    $spam_input = $_POST['spam_input'];
    $query_spam_get_value = mysqli_query($conn, "SELECT DISTINCT seller_notes_report_issue.note_id, seller_notes_report_issue.report_id, seller_notes_report_issue.modifieddate, seller_notes_report_issue.remark,
    seller_notes.note_title, users.firstname, users.lastname, note_categories.category_name FROM seller_notes_report_issue
    LEFT JOIN users ON seller_notes_report_issue.reported_by_id=users.userid LEFT JOIN seller_notes ON
    seller_notes_report_issue.note_id=seller_notes.seller_note_id LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id
    WHERE (seller_notes_report_issue.modifieddate LIKE '%$spam_input%' OR seller_notes_report_issue.remark LIKE '%$spam_input%'
    OR seller_notes.note_title LIKE '%$spam_input%' OR users.firstname LIKE '%$spam_input%' OR users.lastname LIKE '%$spam_input%'
    OR note_categories.category_name LIKE '%$spam_input%')");
} else {
    $query_spam_get_value = mysqli_query($conn, "SELECT DISTINCT seller_notes_report_issue.note_id, seller_notes_report_issue.report_id, seller_notes_report_issue.modifieddate, seller_notes_report_issue.remark,
    seller_notes.note_title, users.firstname, users.lastname, note_categories.category_name FROM seller_notes_report_issue
    LEFT JOIN users ON seller_notes_report_issue.reported_by_id=users.userid LEFT JOIN seller_notes ON
    seller_notes_report_issue.note_id=seller_notes.seller_note_id LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id");
}

if (isset($_POST['spam-yes'])) {
    $member = $_POST['member'];
    $delete_spam = mysqli_query($conn, "DELETE FROM seller_notes_report_issue WHERE report_id=$member");
    header("Refresh: 0;");
}

if (isset($_GET['spamid'])) {
    $spamid = $_GET['spamid'];
    $zipname = 'file.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    $query_attch = mysqli_query($conn, "SELECT * FROM seller_notes_attachments WHERE note_id = $spamid");
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
</head>

<body>

    <?php include "nav-admin.php" ?>
    <div class="general-height">
        <section id="member">
            <div class="container">
                <div class="row member-padding">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <h2>Spam Report</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <form action="" method="POST">
                            <button type="submit" name="spam_search" class="btn btn-primary member-btn">Search</button>
                            <input type="search" name="spam_input" placeholder=' &#xF002;  Search' />
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table id="myTable" class="table text-center border general-table-width spam-report-table">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">REPORTED BY</th>
                                    <th scope="col">NOTE TITLE</th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">DATE EDITED</th>
                                    <th scope="col">REMARK</th>
                                    <th scope="col">ACTION</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($query_spam_get_value)) {
                                    $modifieddate = $row['modifieddate'];
                                    $remark = $row['remark'];
                                    $note_title = $row['note_title'];
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $category_name = $row['category_name'];
                                    $report_id = $row['report_id'];
                                    $note_id = $row['note_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></td>
                                        <td><a href="note-details-admin.php?id=<?php echo $note_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $note_title ?></a></td>
                                        <td><?php echo $category_name ?></td>
                                        <td><?php echo $modifieddate ?></td>
                                        <td><?php echo $remark ?></td>
                                        <td><a id="spam" data-toggle='modal' data-target='#spam_popup' data-spam-id=<?php echo $report_id ?>><img src="img/administrator/delete.png" alt="delete"></a></td>
                                        <td>
                                            <div class="dropdown dropleft">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/administrator/dots.png" alt="">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">

                                                    <a class="dropdown-item" href="spamreport.php?spamid=<?php echo $note_id ?>">Download Notes</a>
                                                    <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $note_id ?>">View More Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <form action="" method="POST">
        <div class="modal fade" id="spam_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="thanks">
                            <p>Are you sure you want to delete reported issue?</p>
                            <input type="hidden" id="spam-hidden" name="member">
                            <button type="submit" class="btn btn-red" name="spam-yes">Yes</button>
                            <button type="submit" class="btn btn-inreview" name="no">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--footer-->
    <?php include "footer-admin.php" ?>
    <!--footer end-->

    <!--popper file-->
    <script src="js/popper.min.js"></script>

    <!-- datatable -->
    <script src="js/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $(document).on('click', '#spam', function() {
            $('#spam-hidden').val($(this).data('spam-id'));
        });
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>