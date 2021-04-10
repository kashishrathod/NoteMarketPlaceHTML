<?php include "admin_db.php";
session_start();

if (isset($_POST['manage-category'])) {
    $search_category = $_POST['search-category'];
    $query_manage_category = mysqli_query($conn, "SELECT note_categories.note_categories_id, note_categories.category_name, note_categories.category_description,
    note_categories.createddate, note_categories.isactive, users.firstname, users.lastname FROM note_categories LEFT JOIN users ON
    note_categories.createdby=users.userid WHERE (note_categories.category_name LIKE '%$search_category%' OR note_categories.category_description
    LIKE '%$search_category%' OR note_categories.createddate LIKE '%$search_category%' OR note_categories.isactive LIKE '%$search_category%'
    OR users.firstname LIKE '%$search_category%' OR users.lastname LIKE '%$search_category%')");
} else {
    $query_manage_category = mysqli_query($conn, "SELECT note_categories.note_categories_id, note_categories.category_name, note_categories.category_description,
    note_categories.createddate, note_categories.isactive, users.firstname, users.lastname FROM note_categories LEFT JOIN users ON
    note_categories.createdby=users.userid");
}

if(isset($_POST['category-yes'])){
    $member = $_POST['member'];
    $inactive_category = mysqli_query($conn, "UPDATE note_categories SET isactive=0 WHERE note_categories_id=$member");
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
                        <h2>Manage Category</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-5 col-12 general">
                        <a href="addcategory.php"><button class="btn administrator-btn">ADD CATEGORY</button></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-7 col-12 general">
                        <form action="" method="POST">
                            <button type="submit" name="manage-category" class="btn administrator-search">Search</button>
                            <input type="search" name="search-category" placeholder=' &#xF002;  Search' />
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table id="myTable" class="table text-center border general-table-width">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">CATEGORY</th>
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
                                while ($row = mysqli_fetch_assoc($query_manage_category)) {
                                    $category_name = $row['category_name'];
                                    $category_description = $row['category_description'];
                                    $createddate = $row['createddate'];
                                    $isactive = $row['isactive'];
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $note_categories_id = $row['note_categories_id'];
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $category_name ?></td>
                                        <td><?php echo $category_description ?></td>
                                        <td><?php echo $createddate ?></td>
                                        <td><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></td>
                                        <?php if ($isactive == 1) { ?>
                                            <td>yes</td>
                                        <?php } else { ?>
                                            <td>no</td>
                                        <?php } ?>
                                        <td>
                                            <a href="addcategory.php?categoryid=<?php echo $note_categories_id ?>"><img src="img/administrator/edit.png" alt="edit"></a>&nbsp;
                                            <a id="category" data-toggle='modal' data-target='#category_popup' data-category-id="<?php echo $note_categories_id ?>"><img src="img/administrator/delete.png" alt="delete"></a>
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
        <div class="modal fade" id="category_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="thanks">
                            <p>Are you sure you want to make this administrator inactive?</p>
                            <input type="hidden" id="category-hidden" name="member">
                            <button type="submit" class="btn btn-red" name="category-yes">Yes</button>
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
        $(document).on('click', '#category', function() {
            $('#category-hidden').val($(this).data('category-id'));
        });
    </script>

    <!--javascript-->
    <script src="js/script.js"></script>

</body>

</html>