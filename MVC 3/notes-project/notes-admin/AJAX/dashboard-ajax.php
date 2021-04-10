<?php include "../admin_db.php";

if (isset($_GET['drop_data'])) {
    $drop_data = $_GET['drop_data'];
} else {
    $drop_data = "";
}

if (isset($_GET['search_data'])) {
    $search_data = $_GET['search_data'];
} else {
    $search_data = "";
}

$query_dashboard = "SELECT seller_notes.note_title, note_categories.category_name,
    reference_data.ref_value, seller_notes.selling_price, seller_notes.publisheddate,
    users.firstname, users.lastname, seller_notes.seller_note_id, seller_notes.seller_id, users.userid
    FROM seller_notes
    LEFT JOIN note_categories ON seller_notes.category=note_categories.note_categories_id LEFT JOIN reference_data
    ON seller_notes.ispaid=reference_data.reference_id LEFT JOIN users ON seller_notes.seller_id=users.userid WHERE seller_notes.status=9";

$append_query = " ";

if (!empty(isset($_GET['search_data'])) && !empty($_GET['search_data']) && $_GET['search_data'] != 0) {
    $append_query .= " AND (seller_notes.note_title LIKE
    '%$search_data%' OR note_categories.category_name LIKE '%$search_data%' OR reference_data.ref_value LIKE '%$search_data%' OR
    seller_notes.selling_price LIKE '%$search_data%' OR seller_notes.publisheddate LIKE '%$search_data%' OR users.firstname LIKE '%$search_data%' OR users.lastname LIKE '%$search_data%')";
}

if (!empty(isset($_GET['drop_data'])) && !empty($_GET['drop_data']) && $_GET['drop_data'] != 0) {
    $explode_array = explode("-", $drop_data);
    $append_query .= " AND MONTH(seller_notes.publisheddate)=$explode_array[0] AND YEAR(seller_notes.publisheddate)=$explode_array[1]";
}

$result_query = $query_dashboard . $append_query;
$result_append = mysqli_query($conn, $result_query);

?>

<div class="row">
    <div class="table-responsive">
        <table id="myTable" class="table text-center border notes-table-width dashboard-note-table">
            <thead>
                <tr>
                    <th scope="col">SR NO.</th>
                    <th scope="col">TITLE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">ATTACHMENT SIZE</th>
                    <th scope="col">SELL TYPE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">PUBLISHER</th>
                    <th scope="col">PUBLISHED DATE</th>
                    <th scope="col">NUMBER OF DOWNLOADS</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;

                while ($row = mysqli_fetch_assoc($result_append)) {
                    $note_title = $row['note_title'];
                    $category_name = $row['category_name'];
                    $ref_value = $row['ref_value'];
                    $selling_price = $row['selling_price'];
                    $publisheddate = $row['publisheddate'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $seller_note_id = $row['seller_note_id'];
                    $seller_id = $row['seller_id'];
                    $userid = $row['userid'];

                    $query_publisher = mysqli_query($conn, "SELECT DISTINCT note_id,downloader FROM downloads WHERE note_id=$seller_note_id AND allow_download=1");
                    $count_publisher = mysqli_num_rows($query_publisher);
                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><a href="note-details-admin.php?id=<?php echo $seller_note_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $note_title ?></a></td>
                        <td><?php echo $category_name ?></td>
                        <td>10KB</td>
                        <td><?php echo $ref_value ?></td>     
                        <td><?php echo $selling_price ?></td>
                        <td><a href="member-details.php?id=<?php echo $seller_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $firstname . " " . $lastname ?></a></td>
                        <td><?php echo $publisheddate ?></td>
                        <td><a href="downloaded-notes.php?noteid=<?php echo $seller_note_id ?>" style='text-decoration: none; color:#6255a5;'><?php echo $count_publisher ?></a></td>
                        <td>
                            <div class="dropdown dropleft">
                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/administrator/dots.png" alt="dot">
                                </a>
                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="dashboard.php?id=<?php echo $seller_note_id ?>">Download Notes</a>
                                    <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $seller_note_id ?>">View More Details</a>
                                    <a class="dropdown-item unpublish" data-id='<?php echo $seller_note_id ?>' data-title-id='<?php echo $note_title ?>' data-toggle='modal' data-target='#exampleModal2'>Unpublished</a>
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


<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<script>
    $(document).on('click', '.unpublish', function() {
        $('#note_id').val($(this).data('id'));
        $('#note_title').val($(this).data('title-id'));
    });
</script>