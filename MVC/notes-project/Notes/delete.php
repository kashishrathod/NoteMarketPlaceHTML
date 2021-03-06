<?php include "db_connection.php";

$id = mysqli_real_escape_string($conn, $_GET['id']);
$result = mysqli_query($conn, "update seller_notes set isactive=0 where seller_note_id=$id");
if($result){
    header('Location: dashboard.php');
}

?>