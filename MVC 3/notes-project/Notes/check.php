<?php

include "db_connection.php";
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];
}
mysqli_query($conn, "update users set isemailverified=1 where userid = $userid");
header("Location:login.php");


?>
