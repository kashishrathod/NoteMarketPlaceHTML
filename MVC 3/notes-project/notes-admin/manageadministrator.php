<?php include "admin_db.php";
session_start();
if (isset($_POST['admin_search'])) {
    $admin_input = $_POST['admin-input'];
    $query_manage_admin = mysqli_query($conn, "SELECT users.userid, users.firstname, users.lastname, users.email_id,
    user_profile.phone_no, user_profile.createddate, users.isactive FROM users LEFT JOIN user_profile ON
    users.userid=user_profile.user_id WHERE role_id=2 AND (users.firstname LIKE '%$admin_input%'
    OR users.lastname LIKE '%$admin_input%' OR users.email_id LIKE '%$admin_input%' OR user_profile.phone_no
    LIKE '%$admin_input%' OR user_profile.createddate LIKE '%$admin_input%')");
} else {
    $query_manage_admin = mysqli_query($conn, "SELECT users.userid, users.firstname, users.lastname, users.email_id,
    user_profile.phone_no, user_profile.createddate, users.isactive FROM users LEFT JOIN user_profile ON
    users.userid=user_profile.user_id WHERE role_id=2");
}

    if (isset($_POST['delete-yes'])) {
        $member = $_POST['member'];
        $delete_admin = mysqli_query($conn, "UPDATE users SET isactive=0 WHERE userid=$member");
        header("Refresh: 0;");
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
        <section id="administrator">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 general">
                        <h2>Manage Administrator</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-5 col-12 general">
                        <a href="addadministrator.php"><button class="btn administrator-btn">ADD ADMINISTRATOR</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                        <form action="" method="POST">
                            <button type="submit" name="admin_search" class="btn administrator-search">Search</button>
                            <input type="search" name="admin-input" placeholder=' &#xF002;  Search' />
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div>
                        <table id="myTable" class="table text-center border general-table-width">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE NO.</th>
                                    <th scope="col">DATA ADDED</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody style="transform: translateY(-20px) !important;">
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($query_manage_admin)) {
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $email_id = $row['email_id'];
                                    $phone_no = $row['phone_no'];
                                    $createddate = $row['createddate'];
                                    $isactive = $row['isactive'];
                                    $userid = $row['userid'];
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $firstname ?></td>
                                        <td><?php echo $lastname ?></td>
                                        <td><?php echo $email_id ?></td>
                                        <?php if (!empty($phone_no)) { ?>
                                            <td><?php echo $phone_no ?></td>
                                        <?php } else { ?>
                                            <td>NULL</td>
                                        <?php } ?>

                                        <?php if (!empty($createddate)) { ?>
                                            <td><?php echo $createddate ?></td>
                                        <?php } else { ?>
                                            <td>NULL</td>
                                        <?php } ?>

                                        <?php if ($isactive == 1) { ?>
                                            <td>yes</td>
                                        <?php } else { ?>
                                            <td>no</td>
                                        <?php } ?>
                                        <td>
                                            <a href="addadministrator.php?editid=<?php echo $userid ?>"><img src="img/administrator/edit.png" alt="edit"></a>&nbsp;
                                            <a id="delete" data-toggle='modal' data-target='#delete_popup' data-user-id="<?php echo $userid ?>"><img src="img/administrator/delete.png" alt="delete"></a>
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
        <div class="modal fade" id="delete_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="thanks">
                            <p>Are you sure you want to make this administrator inactive?</p>
                            <input type="hidden" id="delete-hidden" name="member">
                            <button type="submit" class="btn btn-red" name="delete-yes">Yes</button>
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


    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- datatable -->
    <script src="js/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "scrollX": true
            });
        });
        $(document).on('click', '#delete', function() {
            $('#delete-hidden').val($(this).data('user-id'));
        });
    </script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>