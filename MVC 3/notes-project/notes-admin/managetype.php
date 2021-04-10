<?php include "admin_db.php";
session_start();
if (isset($_POST['search_type'])) {
    $type_input = $_POST['type_input'];
    $query_manage_type = mysqli_query($conn, "SELECT note_type.type_id, note_type.type_name, note_type.type_description,
    note_type.createddate, note_type.isactive, users.firstname, users.lastname FROM note_type LEFT JOIN users ON
    note_type.createdby=users.userid WHERE (note_type.type_name LIKE '%$type_input%' OR note_type.type_description LIKE
    '%$type_input%' OR note_type.createddate LIKE '%$type_input%' OR users.firstname LIKE '%$type_input%' OR
    users.lastname LIKE '%$type_input%')");
} else {
    $query_manage_type = mysqli_query($conn, "SELECT note_type.type_id, note_type.type_name, note_type.type_description,
    note_type.createddate, note_type.isactive, users.firstname, users.lastname FROM note_type LEFT JOIN users ON
    note_type.createdby=users.userid");
}
if(isset($_POST['type-yes'])){
    $member = $_POST['member'];
    $inactivate_type = mysqli_query($conn, "UPDATE note_type SET isactive=0 WHERE type_id=$member");
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
                    <div class="col-lg-12 col-md-12 general">
                        <h2>Manage Type</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-5 col-12 general">
                        <a href="addtype.php"><button class="btn administrator-btn">ADD TYPE</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                        <form action="" method="POST">
                            <button type="submit" name="search_type" class="btn administrator-search">Search</button>
                            <input type="search" name="type_input" placeholder=' &#xF002;  Search' />
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table id="myTable" class="table text-center border general-table-width">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">TYPE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">ADDED BY</th>
                                    <th scope="col">ACTIVE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody style="transform: translateY(-20px) !important;">
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($query_manage_type)) {
                                    $type_id = $row['type_id'];
                                    $type_name = $row['type_name'];
                                    $type_description = $row['type_description'];
                                    $createddate = $row['createddate'];
                                    $isactive = $row['isactive'];
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];

                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $type_name ?></td>
                                        <td><?php echo $type_description ?></td>
                                        <td><?php echo $createddate ?></td>
                                        <td><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></td>
                                        <?php if ($isactive == 1) { ?>
                                            <td>yes</td>
                                        <?php } else { ?>
                                            <td>no</td>
                                        <?php } ?>
                                        <td>
                                            <a href="addtype.php?id=<?php echo $type_id ?>"><img src="img/administrator/edit.png" alt="edit"></a>&nbsp;
                                            <a id="type" data-toggle='modal' data-target='#type_popup' data-type-id="<?php echo $type_id ?>"><img src="img/administrator/delete.png" alt="delete"></a>
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
        <div class="modal fade" id="type_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="thanks">
                            <p>Are you sure you want to make this administrator inactive?</p>
                            <input type="hidden" id="type-hidden" name="member">
                            <button type="submit" class="btn btn-red" name="type-yes">Yes</button>
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
        $(document).on('click', '#type', function() {
            $('#type-hidden').val($(this).data('type-id'));
        });
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>

</body>

</html>