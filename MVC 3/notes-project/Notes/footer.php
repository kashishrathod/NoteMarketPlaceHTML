<?php include "db_connection.php";

$query_config_social = mysqli_query($conn, "SELECT info_value FROM system_configuration WHERE information='facebook'");
while($row = mysqli_fetch_assoc($query_config_social)){
    $facebook_profile = $row['info_value'];
}
$query_config_social_twitter = mysqli_query($conn, "SELECT info_value FROM system_configuration WHERE information='twitter'");
while($row = mysqli_fetch_assoc($query_config_social_twitter)){
    $twitter_profile = $row['info_value'];
}
$query_config_social_linkedin = mysqli_query($conn, "SELECT info_value FROM system_configuration WHERE information='linkedin'");
while($row = mysqli_fetch_assoc($query_config_social_linkedin)){
    $linked_profile = $row['info_value'];
}

?>


<div id="footer">
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6  col-sm-7 col-12">
                    <h3>Copyright &#169; TatvaSoft All rights reserved.</h3>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-5 col-12">
                    <ul class="social pull-right">
                        <li><a href="<?php echo $facebook_profile ?>"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $twitter_profile ?>"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php echo $linked_profile ?>"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>