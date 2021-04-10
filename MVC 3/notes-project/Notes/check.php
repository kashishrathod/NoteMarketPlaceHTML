<?php

include "db_connection.php";
$id = mysqli_real_escape_string($conn, $_GET['userid']);
mysqli_query($conn, "update users set isemailverified=1 where userid = $id");


?>