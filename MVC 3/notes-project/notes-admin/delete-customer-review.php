<?php include "admin_db.php";
if(isset($_GET['note_id'])){
    $note_id = $_GET['note_id'];
}
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

$query_delete_review = mysqli_query($conn, "UPDATE seller_notes_review SET isactive=0 WHERE note_id=$note_id AND reviewed_by_id=$user_id");

if ($query_delete_review) {
    header("Refresh:0; url=review-admin.php?id=$note_id");
}

?>