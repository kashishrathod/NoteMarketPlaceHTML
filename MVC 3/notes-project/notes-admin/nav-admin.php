<?php include "admin_db.php";
if (isset($_SESSION)) {
    echo "";
} else {
    session_start();
}

$email = $_SESSION['email'];
$query_pic = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
while ($row = mysqli_fetch_assoc($query_pic)) {
    $userid = $row['userid'];
    $role_id = $row['role_id'];
}

?>

<nav class="navbar navbar-expand-lg navbar-light  bg-light fixed-top  general-navbar">
    <a class="navbar-brand" href="dashboard.php">
        <img src="img/pre-login/logo.png" alt="Logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="nav-link" role="button" data-toggle="dropdown" style="text-decoration: none; color:#333333;" aria-haspopup="true" aria-expanded="false">
                    Notes</a>
                <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="notes-under-review.php">
                        <h6>Notes Under Review</h6>
                    </a>
                    <a class="dropdown-item" href="published-notes.php">
                        <h6>Published Notes</h6>
                    </a>
                    <a class="dropdown-item" href="downloaded-notes.php">
                        <h6>Downloaded Notes</h6>
                    </a>
                    <a class="dropdown-item" href="rejected-notes.php">
                        <h6>Rejected Notes</h6>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="member.php">Members</a>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="nav-link" role="button" data-toggle="dropdown" style="text-decoration: none; color:#333333;" aria-haspopup="true" aria-expanded="false">
                    Report</a>
                <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="spamreport.php">
                        <h6>Spam Reports</h6>
                    </a>
                </div>
            </li>
            <li class="dropdown nav-item">
                <a href="#" class="nav-link" role="button" data-toggle="dropdown" style="text-decoration: none; color:#333333;" aria-haspopup="true" aria-expanded="false">
                    Setting</a>
                <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                <?php if($role_id == 3) { ?>
                    <a class="dropdown-item" href="managesystem.php">
                        <h6>Manage System Configurations</h6>
                    </a>
                    <a class="dropdown-item" href="manageadministrator.php">
                        <h6>Manage Administrator</h6>
                    </a>
                    <a class="dropdown-item" href="managecategory.php">
                        <h6>Manage Category</h6>
                    </a>
                    <a class="dropdown-item" href="managetype.php">
                        <h6>Manage Types</h6>
                    </a>
                    <a class="dropdown-item" href="managecountry.php">
                        <h6>Manage Countries</h6>
                    </a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="managecategory.php">
                        <h6>Manage Category</h6>
                    </a>
                    <a class="dropdown-item" href="managetype.php">
                        <h6>Manage Types</h6>
                    </a>
                    <a class="dropdown-item" href="managecountry.php">
                        <h6>Manage Countries</h6>
                    </a>
                    <?php } ?>
                </div>
            </li>

            <li class="dropdown">
                <?php if (isset($_SESSION['email'])) { ?>
                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $profile = " ";
                        $query_profile = mysqli_query($conn, "SELECT * FROM user_profile WHERE user_id=$userid");
                        $count = mysqli_num_rows($query_profile);
                        while ($row = mysqli_fetch_assoc($query_profile)) {
                            $profile = $row['profile_picture'];
                        }
                        if ($count > 0) { ?>
                            <img src="<?php echo $profile ?>" alt="user" class="img-fluid" style="margin-top: 9px">
                        <?php  } else { ?>
                            <img src="img/pre-login/user-img.png" alt="user" class="img-fluid" style="margin-top: 9px">
                        <?php  } ?>
                    </a>
                <?php } ?>
                <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="myprofile-admin.php">
                        <h6>Update Profile</h6>
                    </a>
                    <a class="dropdown-item" href="admin-changepassword.php">
                        <h6>Change Password</h6>
                    </a>
                    <a class="dropdown-item" href="logout-admin.php">
                        <h6>LOGOUT</h6>
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['email'])) { ?>
                    <a class="btn btn-nav-login" type="submit" data-toggle='modal' data-target='#exampleModal1'><b>Logout</b></a>
                <?php  } else { ?>
                    <a href="login-admin.php" class="btn btn-nav-login" type="submit"><b>Login</b></a>
                <?php  }  ?>
            </li>
        </ul>
    </div>
</nav>

<form action="" method="POST">
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="thanks">
                        <p>Are you sure, you want to logout?</p>
                        <a href="logout-admin.php" type="submit" class="btn btn-primary" name="yes-popup">Yes</a>
                        <button type="submit" class="btn btn-primary" name="no">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
