<?php include "admin_db.php";
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$delete_admin = mysqli_query($conn, "UPDATE users SET isactive=0 WHERE userid=$id");
header('Location: manageadministrator.php');

?>