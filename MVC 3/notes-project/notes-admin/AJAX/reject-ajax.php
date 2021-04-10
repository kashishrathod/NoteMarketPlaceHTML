<?php include "../admin_db.php";
session_start();


$query_reject = "SELECT seller_notes.seller_note_id, seller_notes.note_title, note_categories.category_name,
seller_notes.seller_id, seller_notes.createddate, seller_notes.admin_remark, u.firstname seller_fname, u.lastname seller_lname,
ua.firstname action_fname, ua.lastname action_lname, seller_notes.actionby FROM seller_notes
LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id
LEFT JOIN users u ON seller_notes.seller_id=u.userid
LEFT JOIN users ua ON seller_notes.actionby=ua.userid WHERE seller_notes.status=10";

if (isset($_GET['reject_data'])) {
    $reject_data = $_GET['reject_data'];
} else {
    $reject_data = " ";
}

if (isset($_GET['seller_data'])) {
    $seller_data = $_GET['seller_data'];
} else {
    $seller_data = " ";
}


$append_query = " ";
if (!empty(isset($_GET['reject_data'])) && !empty($_GET['reject_data']) && $_GET['reject_data'] != 0) {
    $append_query .= " AND (seller_notes.note_title LIKE '%$reject_data%' OR note_categories.category_name 
    LIKE '%$reject_data%' OR seller_notes.createddate LIKE '%$reject_data%' OR u.firstname LIKE '%$reject_data%' OR
    u.lastname LIKE '%$reject_data%' OR ua.firstname LIKE '%$reject_data%' OR ua.lastname LIKE '%$reject_data%'
    OR seller_notes.admin_remark LIKE '%$reject_data%')";
}

if (!empty(isset($_GET['seller_data'])) && !empty($_GET['seller_data']) && $_GET['seller_data'] != 0) {
    $append_query .= " AND seller_notes.seller_id = $seller_data";
}

$append_reject = $query_reject . $append_query;
$result_reject = mysqli_query($conn, $append_reject);

?>

<div class="row">
    <div>
        <table id="myTable" class="table text-center border publish-table-width rejected-notes-table">
            <thead>
                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">NOTE TITLE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">SELLER</th>
                    <th scope="col"></th>
                    <th scope="col">DATE ADDED</th>
                    <th scope="col">REJECTED BY</th>
                    <th scope="col">REMARK</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result_reject)) {
                    $seller_note_id = $row['seller_note_id'];
                    $note_title = $row['note_title'];
                    $category_name = $row['category_name'];
                    $seller_fname = $row['seller_fname'];
                    $seller_lname = $row['seller_lname'];
                    $action_fname = $row['action_fname'];
                    $action_lname = $row['action_lname'];
                    $createddate = $row['createddate'];
                    $admin_remark = $row['admin_remark'];
                    $seller_id = $row['seller_id'];
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $note_title ?></a></td>
                        <td><?php echo $category_name ?></td>
                        <td><?php echo $seller_fname ?>&nbsp;<?php echo $seller_lname ?></td>
                        <td><a href="member-details.php?id=<?php echo $seller_id ?>"><img src="img/login-img/eye.png" alt="eye"></a></td>
                        <td><?php echo $createddate ?></td>
                        <td><?php echo $action_fname ?>&nbsp;<?php echo $action_lname ?></td>
                        <td><?php echo $admin_remark ?></td>
                        <td>
                            <div class="dropdown dropleft">
                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/administrator/dots.png" alt="dots">
                                </a>
                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                    <a id="approve_id" class="dropdown-item" data-note-id="<?php echo $seller_note_id ?>" data-toggle='modal' data-target='#approve_popup'>Approve</a>
                                    <a class="dropdown-item" href="rejected-notes.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
                                    <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $seller_note_id ?>">View More Details</a>
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
<form action="" method="POST">
    <div class="modal fade" id="approve_popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="thanks">
                        <p>If you approve the notes – System will publish the notes over portal. Please press yes to continue.</p>
                        <input type="hidden" id="approve-hidden" name="publish-hidden">
                        <button type="submit" class="btn btn-red" name="approve-yes">Yes</button>
                        <button type="submit" class="btn btn-inreview" name="no">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    $(document).on('click', '#approve_id', function() {
        $('#approve-hidden').val($(this).data('note-id'));
    });
</script>