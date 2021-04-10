<?php include "../admin_db.php";
session_start();

$query_publish = "SELECT seller_notes.seller_note_id, seller_notes.note_title, note_categories.category_name, reference_data.ref_value,
seller_notes.selling_price, seller_notes.seller_id, seller_notes.publisheddate, u.firstname AS seller_fname, u.lastname AS seller_lname,
ua.firstname AS action_fname, ua.lastname AS action_lname, seller_notes.actionby FROM seller_notes LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id 
LEFT JOIN reference_data ON seller_notes.status=reference_data.reference_id LEFT JOIN users AS u ON seller_notes.seller_id=u.userid
LEFT JOIN users AS ua ON seller_notes.actionby=ua.userid WHERE seller_notes.status=9";

$append_query = " ";

if (isset($_GET['search_publish_data'])) {
    $search_publish_data = $_GET['search_publish_data'];
} else {
    $search_publish_data = " ";
}

if (isset($_GET['seller_data'])) {
    $seller_data = $_GET['seller_data'];
} else {
    $seller_data = " ";
}

if (isset($_GET['member_data'])) {
    $member_data = $_GET['member_data'];
} else {
    $member_data = "";
}

if (!empty(isset($_GET['search_publish_data'])) && !empty($_GET['search_publish_data']) && $_GET['search_publish_data'] != 0) {
    $append_query .= " AND (seller_notes.note_title LIKE '%$search_publish_data%' OR note_categories.category_name 
    LIKE '%$search_publish_data%' OR seller_notes.publisheddate LIKE '%$search_publish_data%' OR
    ua.firstname LIKE '%$search_publish_data%' OR ua.lastname LIKE '%$search_publish_data%' OR seller_notes.selling_price
    LIKE '%$search_publish_data%' OR u.firstname LIKE '%$search_publish_data%' OR u.lastname LIKE '%$search_publish_data%')";
}
if (!empty(isset($_GET['seller_data'])) && !empty($_GET['seller_data']) && $_GET['seller_data'] != 0) {
    $append_query .= " AND seller_notes.seller_id='$seller_data'";
}
if (!empty(isset($_GET['member_data'])) && !empty($_GET['member_data']) && $_GET['member_data'] != 0) {
    $append_query .= " AND seller_notes.seller_id='$member_data'";
}
$result_query = $query_publish . $append_query;
$result_append = mysqli_query($conn, $result_query);

?>


<div class="row">
    <div class="table-responsive">
        <table id="myTable" class="table text-center border publish-table-width published-note-table">
            <thead>
                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">NOTE TITLE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">SELL TYPE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">SELLER</th>
                    <th scope="col"></th>
                    <th scope="col">PUBLISHED DATE</th>
                    <th scope="col">APPROVED BY</th>
                    <th scope="col">NUMBER OF DOWNLOADS</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result_append)) {
                    $seller_note_id = $row['seller_note_id'];
                    $note_title = $row['note_title'];
                    $category_name = $row['category_name'];
                    $ref_value = $row['ref_value'];
                    $selling_price = $row['selling_price'];
                    $seller_fname = $row['seller_fname'];
                    $seller_lname = $row['seller_lname'];
                    $action_fname = $row['action_fname'];
                    $action_lname = $row['action_lname'];
                    $publisheddate = $row['publisheddate'];
                    $seller_id = $row['seller_id'];

                    $query_publisher = mysqli_query($conn, "SELECT DISTINCT note_id, downloader FROM downloads WHERE note_id=$seller_note_id AND allow_download=1");
                    $count_publisher = mysqli_num_rows($query_publisher);

                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $note_title ?></a></td>
                        <td><?php echo $category_name ?></td>
                        <td><?php echo $ref_value ?></td>
                        <td><?php echo $selling_price ?></td>
                        <td><?php echo $seller_fname ?>&nbsp;<?php echo $seller_lname ?></td>
                        <td><a href="member-details.php?id=<?php echo $seller_id ?>"><img src="img/login-img/eye.png" alt="eye"></a></td>
                        <td><?php echo $publisheddate ?></td>
                        <td><?php echo $action_fname ?>&nbsp;<?php echo $action_lname ?></td>
                        <td><a href="downloaded-notes.php?noteid=<?php echo $seller_note_id ?>" style='text-decoration: none; color:#6255a5;'><?php echo $count_publisher ?></a></td>
                        <td>
                            <div class="dropdown dropleft">
                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/administrator/dots.png" alt="">
                                </a>
                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="published-notes.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
                                    <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $seller_note_id ?>">View More Details</a>
                                    <a class="dropdown-item" id="unpublish_id" data-note-id=<?php echo $seller_note_id ?> data-title-id=<?php echo $note_title ?> data-toggle='modal' data-target='#unpublish-popup'>Unpublish</a>
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
    <div class="modal hide" id="unpublish-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="thanks">
                        <input type="text" class="form-control" value="" name="title" id="publish-title" disabled>
                        <label for="" style="margin-top: 10px;">Remark:</label>
                        <textarea rows="4" cols="55" name="remark"></textarea>
                        <button type="submit" class="btn btn-red" name="Unpublish" style="margin-top: 10px;">Unpublish</button>
                        <button type="submit" class="btn btn-inreview" name="no" style="margin-top: 10px;">cancel</button>
                        <input name="noteid" id="publish_hidden" type="hidden">
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
    $(document).on("click", "#unpublish_id", function() {
        $('#publish_hidden').val($(this).data('note-id'));
        $('#publish-title').val($(this).data('title-id'));
    });
</script>