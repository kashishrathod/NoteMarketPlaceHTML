<?php include "admin_db.php";
session_start();
if (isset($_POST['member_search'])) {
    $member_input = $_POST['member_input'];
    $query_member_user = mysqli_query($conn, "SELECT * FROM users WHERE role_id=1 AND isactive=1 AND
     (firstname LIKE '%$member_input%' OR lastname LIKE '%$member_input%' OR email_id LIKE '%$member_input%' OR createddate LIKE '%$member_input%')");
} else {
    $query_member_user = mysqli_query($conn, "SELECT * FROM users WHERE role_id=1 AND isactive=1");
}

if (isset($_POST['deactivate-yes'])) {
    $member = $_POST['member'];
    $deactivate_update_query = mysqli_query($conn, "UPDATE seller_notes SET status=11 WHERE seller_id=$member");
    $deactive_user_query = mysqli_query($conn, "UPDATE users SET isactive=0 WHERE userid=$member");
    header("Refresh:0;");
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
                        <h2>Members</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 general">
                        <form action="" method="POST">
                            <button type="submit" name="member_search" class="btn btn-primary member-btn">Search</button>
                            <input type="search" name="member_input" placeholder=' &#xF002;  Search' />
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="myTable" class="table text-center border member-table-width">
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
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($query_member_user)) {
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $email_id = $row['email_id'];
                                    $createddate = $row['createddate'];
                                    $userid = $row['userid'];

                                    $query_under_review = mysqli_query($conn, "SELECT COUNT(status) FROM seller_notes WHERE seller_id=$userid AND (status=7 OR status=8)");
                                    while ($row = mysqli_fetch_assoc($query_under_review)) {
                                        $status_under_review = $row['COUNT(status)'];
                                    }
                                    $query_publish_note = mysqli_query($conn, "SELECT COUNT(status) FROM seller_notes WHERE seller_id=$userid AND status=9");
                                    while ($row = mysqli_fetch_assoc($query_publish_note)) {
                                        $status_publish_note = $row['COUNT(status)'];
                                    }
                                    $query_download_note = mysqli_query($conn, "SELECT COUNT(DISTINCT note_id) FROM downloads WHERE allow_download=1 AND downloader=$userid");
                                    while ($row = mysqli_fetch_assoc($query_download_note)) {
                                        $downloaded_note = $row['COUNT(DISTINCT note_id)'];
                                    }
                                    $query_earning = mysqli_query($conn, "SELECT DISTINCT note_id, SUM(purchased_price) FROM downloads WHERE seller=$userid AND allow_download=1");
                                    while ($row = mysqli_fetch_assoc($query_earning)) {
                                        $total_earning = $row['SUM(purchased_price)'];
                                    }

                                    $query_expense = mysqli_query($conn, "SELECT DISTINCT note_id, SUM(purchased_price) FROM downloads WHERE downloader=$userid AND allow_download=1");
                                    while ($row = mysqli_fetch_assoc($query_expense)) {
                                        $total_expense = $row['SUM(purchased_price)'];
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $firstname ?></td>
                                        <td><?php echo $lastname ?></td>
                                        <td><?php echo $email_id ?></td>
                                        <td><?php echo $createddate ?></td>
                                        <td><a href="notes-under-review.php?memberid=<?php echo $userid ?>" style="color: #6244a5; text-decoration: none;"><?php echo $status_under_review ?></a></td>
                                        <td><a href="published-notes.php?memberid=<?php echo $userid ?>" style="color: #6244a5; text-decoration: none;"><?php echo $status_publish_note ?></a></td>
                                        <td><a href="downloaded-notes.php?memberid=<?php echo $userid ?>" style="color: #6244a5; text-decoration: none;"><?php echo $downloaded_note ?></a></td>
                                        <?php if ($total_expense != 0) { ?>
                                            <td><a href="downloaded-notes.php?memberid=<?php echo $userid ?>" style="color: #6244a5; text-decoration: none;">$<?php echo $total_expense ?></a></td>
                                        <?php } else { ?>
                                            <td><a href="downloaded-notes.php?memberid=<?php echo $userid ?>" style="color: #6244a5; text-decoration: none;">$0</a></td>
                                        <?php } ?>
                                        <?php if ($total_earning != 0) { ?>
                                            <td>$<?php echo $total_earning ?></td>
                                        <?php } else { ?>
                                            <td>$0</td>
                                        <?php } ?>
                                        
                                        <td>
                                            <div class="dropdown dropleft">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/administrator/dots.png" alt="dot">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="member-details.php?id=<?php echo $userid ?>">View More Details</a>
                                                    <a class="dropdown-item" id='deactivate' data-toggle='modal' data-target='#deactivate_popup' data-user-id="<?php echo $userid ?>">Deactivate</a>
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
        <div class="modal fade" id="deactivate_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="thanks">
                            <p>Are you sure you want to make this member inactive?</p>
                            <input type="hidden" id="deactivate-hidden" name="member">
                            <button type="submit" class="btn btn-red" name="deactivate-yes">Yes</button>
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
            $('#myTable').DataTable({
                "scrollX": true
            });
        });
        $(document).on('click', '#deactivate', function() {
            $('#deactivate-hidden').val($(this).data('user-id'));
        });
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>