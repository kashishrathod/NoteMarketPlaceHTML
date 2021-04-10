<?php include "../admin_db.php";
session_start();


if (isset($_GET['search'])) {
    $search = $_GET['search'];
} else {
    $search = "";
}

if (isset($_GET['drop_seller'])) {
    $drop_seller = $_GET['drop_seller'];
} else {
    $drop_seller = "";
}

if(isset($_GET['member_data'])){
    $member_data = $_GET['member_data'];
}
else{
    $member_data = "";
}

$query_note_under_review = "SELECT seller_notes.seller_note_id, seller_notes.seller_id, seller_notes.note_title, note_categories.category_name,
users.firstname, users.lastname, seller_notes.publisheddate, reference_data.ref_value FROM seller_notes LEFT JOIN
note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data ON
seller_notes.status=reference_data.reference_id LEFT JOIN users ON seller_notes.seller_id=users.userid WHERE
(seller_notes.status=7 OR seller_notes.status=8)";

$append_query = " ";

if (!empty(isset($_GET['search'])) && !empty($_GET['search']) && $_GET['search'] != 0) {
    $append_query .= " AND (seller_notes.note_title LIKE '%$search%' OR note_categories.category_name
    LIKE '%$search%' OR seller_notes.publisheddate LIKE '%$search%' OR users.firstname LIKE '%$search%'
    OR users.lastname LIKE '%$search%')";
}
if (!empty(isset($_GET['drop_seller'])) && !empty($_GET['drop_seller']) && $_GET['drop_seller'] != 0) {
    $append_query .= " AND seller_notes.seller_id='$drop_seller'";
}
if (!empty(isset($_GET['member_data'])) && !empty($_GET['member_data']) && $_GET['member_data'] != 0) {
    $append_query .= " AND seller_notes.seller_id='$member_data'";
}

$append = $query_note_under_review . $append_query;
$result_append = mysqli_query($conn, $append);

?>
<div class="row">
    <div class="table-responsive">
        <table id="myTable" class="table border review-table-width note-under-review-table">
            <thead>
                <tr class="text-center">
                    <th scope="col">SR NO.</th>
                    <th scope="col">NOTE TITLE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">SELLER</th>
                    <th scope="col"></th>
                    <th scope="col">DATE ADDED</th>
                    <th scope="col">STATUS</th>
                    <th scope="col"></th>
                    <th scope="col">ACTION</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result_append)) {
                    $note_title = $row['note_title'];
                    $category_name = $row['category_name'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $publisheddate = $row['publisheddate'];
                    $ref_value = $row['ref_value'];
                    $seller_note_id = $row['seller_note_id'];
                    $seller_id = $row['seller_id'];
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $note_title ?></a></td>
                        <td><?php echo $category_name ?></td>
                        <td><?php echo $firstname ?>&nbsp;<?php echo $lastname ?></td>
                        <td><a href="member-details.php?id=<?php echo $seller_id ?>"><img src="img/administrator/eye.png" alt="eye"></a></td>
                        <td><?php echo $publisheddate ?></td>
                        <td><?php echo $ref_value ?></td>
                        <td><a class="btn btn-green" id="approve_id" data-id="<?php echo $seller_note_id ?>" data-toggle='modal' data-target='#green'>Approve</a></td>
                        <td><a class="btn btn-red" id="reject_id" data-reject-id="<?php echo $seller_note_id ?>" data-reject-title-id="<?php echo $note_title ?>" data-toggle='modal' data-target='#red'>Reject</a></td>
                        <td><a class="btn btn-inreview" id="review_id" data-review-id="<?php echo $seller_note_id ?>" data-toggle='modal' data-target='#gray'>InReview</a></td>
                        <td>
                            <div class="dropdown dropleft">
                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/administrator/dots.png" alt="dots">
                                </a>
                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="notes-under-review.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
                                    <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $seller_note_id ?>">View More Details</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                    $i++;
                }

                ?>
            </tbody>
        </table>
    </div>
</div>

<form action="" method="POST">
    <!-- modal1 -->
    <div class="modal fade" id="green" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="thanks">
                        <p>If you approve the notes – System will publish the notes over portal. Please press yes to continue.</p>
                        <input type="hidden" id="green-hidden" name="approve-hidden">
                        <button type="submit" class="btn btn-green" name="approve">Yes</button>
                        <button type="submit" class="btn btn-green" name="no">No</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal2 -->
    <div class="modal fade" id="gray" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="thanks">
                        <p>“Via marking the note In Review – System will let user know that review process has been initiated. Please press yes to continue.” With yes, no buttons.</p>
                        <input type="hidden" id="gray-hidden" name="review-hidden">
                        <button type="submit" class="btn btn-inreview" name="review">Yes</button>
                        <button type="submit" class="btn btn-inreview" name="no">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal3 -->
    <div class="modal hide" id="red" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body">
                        <div class="thanks">
                            <input type="text" class="form-control" value="" name="title" id="red-hidden-title" disabled>
                            <label for="" style="margin-top: 10px;">Remark:</label>
                            <textarea rows="4" cols="55" name="admin-remark"></textarea>
                            <button type="submit" class="btn btn-red" name="reject" style="margin-top: 10px;">Reject</button>
                            <button type="submit" class="btn btn-inreview" name="no" style="margin-top: 10px;">cancel</button>
                            <input name="noteid" id="red-hidden" type="hidden">
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
        $('#green-hidden').val($(this).data('id'));
    });

    $(document).on('click', '#review_id', function() {
        $('#gray-hidden').val($(this).data('review-id'));
    });

    $(document).on('click', '#reject_id', function() {
        $('#red-hidden-title').val($(this).data('reject-title-id'));
        $('#red-hidden').val($(this).data('reject-id'));

    });
</script>