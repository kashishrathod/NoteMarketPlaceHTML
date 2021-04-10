<?php include "db_connection.php";
if (isset($_SESSION)) {
    echo "";
} else {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg navbar-light  bg-light fixed-top  general-navbar">
    <a class="navbar-brand" href="#">
        <img src="img/pre-login/logo.png" alt="Logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="searchnote.php">Search Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Sell Your Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buyerrequest.php">Buyer Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
            </li>
            <li class="dropdown drop-nav-border">

                <?php if (isset($_SESSION['email'])) { ?>

                    <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        $profile = "";
                        $email = $_SESSION['email'];
                        $query = mysqli_query($conn, "SELECT * FROM users WHERE email_id='$email'");
                        while ($row = mysqli_fetch_assoc($query)) {
                            $userid = $row['userid'];
                        }
                        $query_pic = mysqli_query($conn, "SELECT * FROM user_profile WHERE user_id=$userid");
                        $count_pic = mysqli_num_rows($query_pic);
                        while ($row = mysqli_fetch_assoc($query_pic)) {
                            $profile = $row['profile_picture'];
                        }
                        
                        if ($count_pic > 0)
                            echo "<img src='$profile' alt='user' class='img-fluid' style='margin-top: 9px; width: 40px; height: 40px; border-radius: 50%;'>";
                        else
                            echo "<img src='../Member/14profile-pic-1617128757.png' alt='user' class='img-fluid' style='margin-top: 9px; width: 40px; height: 40px; border-radius: 50%;'>";
                        ?>
                    </a>

                <?php } else {
                } ?>
                <div class="dropdown-menu shadow-drop dropdowncustom" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="userprofile.php">
                        <h6>My Profile</h6>
                    </a>
                    <a class="dropdown-item" href="mydownload.php">
                        <h6>My Downloads</h6>
                    </a>
                    <a class="dropdown-item" href="mysoldnotes.php">
                        <h6>My Sold Notes</h6>
                    </a>
                    <a class="dropdown-item" href="rejectednotes.php">
                        <h6>My Rejected Notes</h6>
                    </a>
                    <a class="dropdown-item" href="changepass.php">
                        <h6>Change Password</h6>
                    </a>
                    <a class="dropdown-item pur_col" href="logout.php">
                        <h5><b>LOGOUT</b></h5>
                    </a>
                </div>
            </li>

            <li class="nav-item">

                <?php if (isset($_SESSION['email'])) { ?>
                    <a href="logout.php"><button class="btn btn-nav-login" type="submit"><b>LOGOUT</b></button></a>
                <?php } else {
                ?>
                    <a href="login.php"><button class="btn btn-nav-login" type="submit"><b>LOGIN</b></button></a>
                <?php } ?>

            </li>
        </ul>
    </div>
</nav>