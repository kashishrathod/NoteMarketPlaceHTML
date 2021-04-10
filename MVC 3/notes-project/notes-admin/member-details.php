<?php include "admin_db.php";
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$query_member_details = mysqli_query($conn, "SELECT user_profile.user_id, users.email_id,
user_profile.date_of_birth, user_profile.phone_no, user_profile.college, user_profile.university,
user_profile.address_1, user_profile.address_2, user_profile.city, user_profile.state,
user_profile.zip_code, user_profile.profile_picture,
countries.country_name, users.firstname, users.lastname FROM users LEFT JOIN user_profile ON
users.userid=user_profile.user_id LEFT JOIN countries ON user_profile.country=countries.country_id WHERE users.userid=$id");
while ($row = mysqli_fetch_assoc($query_member_details)) {
    $secondary_email = $row['email_id'];
    $date_of_birth = $row['date_of_birth'];
    $phone_no = $row['phone_no'];
    $college = $row['college'];
    $university = $row['university'];
    $address_1 = $row['address_1'];
    $address_2 = $row['address_2'];
    $city = $row['city'];
    $state = $row['state'];
    $zip_code = $row['zip_code'];
    $country_name = $row['country_name'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $profile_picture = $row['profile_picture'];
}
if(isset($_GET['note-id'])){
    $id1 = $_GET['note-id'];
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

    <section id="member-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Member Details</h3>
                </div>
            </div>
            <div class="row member-border-bottom">

                <div class="col-lg-2 col-md-12 col-sm-12 col-12">
                     <?php if(!empty($profile_picture)) { ?>
                    <img src="<?php echo $profile_picture ?>" alt="member" style="width: 150px; height: 150px;">
                    <?php } else {  ?>
                     <img src="../Member/14profile-pic-1617128757.png" alt="member" style="width: 150px; height: 150px;">  
                   <?php  } ?>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-12">
                    <div class="row right-border-member">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6">
                            <h4 class="member-font-1">First Name:</h4>
                            <h4 class="member-font-1">Last Name:</h4>
                            <h4 class="member-font-1">Email:</h4>
                            <h4 class="member-font-1">DOB:</h4>
                            <h4 class="member-font-1">Phone Number:</h4>
                            <h4 class="member-font-1">College/University:</h4>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                            <h4 class="member-font-2"><?php echo $firstname ?></h4>
                            <h4 class="member-font-2"><?php echo $lastname ?></h4>
                            <h4 class="member-font-2"><?php echo $secondary_email ?></h4>
                            <h4 class="member-font-2"><?php echo $date_of_birth ?></h4>
                            <h4 class="member-font-2"><?php echo $phone_no ?></h4>
                            <h4 class="member-font-2"><?php echo $college ?>&nbsp;<?php echo $university ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 col-6">
                            <h4 class="member-font-1">Address 1:</h4>
                            <h4 class="member-font-1">Address 2:</h4>
                            <h4 class="member-font-1">City:</h4>
                            <h4 class="member-font-1">State:</h4>
                            <h4 class="member-font-1">Country:</h4>
                            <h4 class="member-font-1">Zip Code:</h4>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-6">
                            <h4 class="member-font-2"><?php echo $address_1 ?></h4>
                            <h4 class="member-font-2"><?php echo $address_2 ?></h4>
                            <h4 class="member-font-2"><?php echo $city ?></h4>
                            <h4 class="member-font-2"><?php echo $state ?></h4>
                            <h4 class="member-font-2"><?php echo $country_name ?></h4>
                            <h4 class="member-font-2"><?php echo $zip_code ?></h4>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <div class="general-height">
        <section id="member-details-table">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="member-notes">Notes</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table id="myTable" class="table text-center border notes-table-width member-note-table">
                            <thead>
                                <tr>
                                    <th scope="col">SR NO.</th>
                                    <th scope="col">NOTE TITLE </th>
                                    <th scope="col">CATEGORY</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">DOWNLOADED NOTES</th>
                                    <th scope="col">TOTAL EARNINGS</th>
                                    <th scope="col">DATE ADDED</th>
                                    <th scope="col">PUBLISHED DATE</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query_note_table = mysqli_query($conn, "SELECT seller_notes.seller_note_id, seller_notes.note_title, note_categories.category_name,
                                reference_data.ref_value, seller_notes.selling_price, seller_notes.createddate, seller_notes.publisheddate
                                FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id
                                LEFT JOIN reference_data ON seller_notes.status=reference_data.reference_id WHERE seller_id=$id");

                                $i = 1;
                                while ($row = mysqli_fetch_assoc($query_note_table)) {
                                    $note_title = $row['note_title'];
                                    $category_name = $row['category_name'];
                                    $ref_value = $row['ref_value'];
                                    $selling_price = $row['selling_price'];
                                    $createddate = $row['createddate'];
                                    $publisheddate = $row['publisheddate'];
                                    $seller_note_id = $row['seller_note_id'];


                                    $query_dowloaded_notes = mysqli_query($conn, "SELECT COUNT(DISTINCT downloader), purchased_price FROM downloads WHERE note_id=$seller_note_id AND allow_download=1");
                                    while($row = mysqli_fetch_assoc($query_dowloaded_notes)){
                                        $downloader = $row['COUNT(DISTINCT downloader)'];
                                        $purchased_price = $row['purchased_price'];
                                        $total_earning = $purchased_price * $downloader;
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $note_title ?></td>
                                        <td><?php echo $category_name ?></td>
                                        <td><?php echo $ref_value ?></td>
                                        <td><?php echo $downloader ?></td>
                                        <td>$<?php echo $total_earning ?></td>
                                        <td><?php echo $createddate ?></td>
                                        <td><?php echo $publisheddate ?></td>
                                        <td>
                                            <div class="dropdown dropleft">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="img/administrator/dots.png" alt="dots">
                                                </a>
                                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="member-details.php?id=<?php echo $id ?>&note-id=<?php echo $seller_note_id ?>">Download Notes</a>
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
    </script>

    <!--bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!--javascript-->
    <script src="js/script.js"></script>
</body>

</html>