<?php include "../admin_db.php";
session_start();

$query_download = "SELECT DISTINCT downloads.note_id, downloads.note_title, downloads.note_category, s.firstname AS seller_f,
s.lastname AS seller_l, b.firstname AS buyer_f, b.lastname AS buyer_l, reference_data.ref_value, downloads.purchased_price, downloads.downloaded_date,
downloads.seller, downloads.downloader
FROM downloads LEFT JOIN users s ON downloads.seller=s.userid
LEFT JOIN users b ON downloads.downloader=b.userid
LEFT JOIN reference_data ON downloads.ispaid=reference_data.reference_id WHERE allow_download=1";

$append_query = " ";

if (isset($_GET['download_search_data'])) {
    $download_search_data = $_GET['download_search_data'];
} else {
    $download_search_data = " ";
}
if (isset($_GET['note_data'])) {
    $note_data = $_GET['note_data'];
} else {
    $note_data = " ";
}
if (isset($_GET['seller_data'])) {
    $seller_data = $_GET['seller_data'];
} else {
    $seller_data = " ";
}
if (isset($_GET['buyer_data'])) {
    $buyer_data = $_GET['buyer_data'];
} else {
    $buyer_data = " ";
}
if (isset($_GET['member_data'])) {
    $member_data = $_GET['member_data'];
} else {
    $member_data = "";
}
if (isset($_GET['note_data_1'])) {
    $note_data_1 = $_GET['note_data_1'];
} else {
    $note_data_1 = "";
}

if (!empty(isset($_GET['download_search_data'])) && !empty($_GET['download_search_data']) && $_GET['download_search_data'] != 0) {
    $append_query .= " AND (downloads.note_title LIKE '%$download_search_data%' OR downloads.note_category LIKE '%$download_search_data%'
    OR s.firstname LIKE '%$download_search_data%' OR s.lastname LIKE '%$download_search_data%' OR b.firstname LIKE '%$download_search_data%'
    OR b.lastname LIKE '%$download_search_data%' OR reference_data.ref_value LIKE '%$download_search_data%' OR downloads.purchased_price
    LIKE '%$download_search_data%' OR downloads.downloaded_date LIKE '%$download_search_data%')";
}

if (!empty(isset($_GET['note_data'])) && !empty($_GET['note_data']) && $_GET['note_data'] != 0) {
    $append_query .= " AND downloads.note_title='$note_data'";
}
if (!empty(isset($_GET['seller_data'])) && !empty($_GET['seller_data']) && $_GET['seller_data'] != 0) {
    $append_query .= " AND downloads.seller='$seller_data'";
}
if (!empty(isset($_GET['buyer_data'])) && !empty($_GET['buyer_data']) && $_GET['buyer_data'] != 0) {
    $append_query .= " AND downloads.downloader='$buyer_data'";
}
if (!empty(isset($_GET['member_data'])) && !empty($_GET['member_data']) && $_GET['member_data'] != 0) {
    $append_query .= " AND (downloads.downloader='$member_data')";
}
if (!empty(isset($_GET['note_data_1'])) && !empty($_GET['note_data_1']) && $_GET['note_data_1'] != 0) {
    $append_query .= " AND (downloads.note_id='$note_data_1')";
}

$download_append = $query_download . $append_query;
$result_download = mysqli_query($conn, $download_append);

?>

<div class="row">
    <div class="table-responsive">
        <table id="myTable" class="table text-center border notes-table-width downloaded-note-table">
            <thead>
                <tr class="text-center">
                    <th scope="col">SR NO.</th>
                    <th scope="col">NOTE TITLE</th>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">BUYER</th>
                    <th scope="col"></th>
                    <th scope="col">SELLER</th>
                    <th scope="col"></th>
                    <th scope="col">SELL TYPE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">DOWNLOADED DATE/TIME</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysqli_fetch_assoc($result_download)) {
                    $note_title = $row['note_title'];
                    $note_category = $row['note_category'];
                    $buyer_f = $row['buyer_f'];
                    $buyer_l = $row['buyer_l'];
                    $seller_f = $row['seller_f'];
                    $seller_l = $row['seller_l'];
                    $ref_value = $row['ref_value'];
                    $purchased_price = $row['purchased_price'];
                    $downloaded_date = $row['downloaded_date'];
                    $note_id = $row['note_id'];
                    $downloader = $row['downloader'];
                    $seller = $row['seller'];

                ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><a href="note-details-admin.php?id=<?php echo $note_id ?>" style="color: #6244a5; text-decoration: none;"><?php echo $note_title ?></a></td>
                        <td><?php echo $note_category ?></td>
                        <td><?php echo $buyer_f ?>&nbsp;<?php echo $buyer_l ?></td>
                        <td><a href="member-details.php?id=<?php echo $downloader ?>"><img src="img/login-img/eye.png" alt="eye"></a></td>
                        <td><?php echo $seller_f ?>&nbsp;<?php echo $seller_l ?></td>
                        <td><a href="member-details.php?id=<?php echo $seller ?>"><img src="img/login-img/eye.png" alt="eye"></a></td>
                        <td><?php echo $ref_value ?></td>
                        <td><?php echo $purchased_price ?></td>
                        <td><?php echo $downloaded_date ?></td>
                        <td>
                            <div class="dropdown dropleft">
                                <a class="btn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="img/administrator/dots.png" alt="dot">
                                </a>


                                <div class="dropdown-menu dots-shadow" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="downloaded-notes.php?id=<?php echo $note_id ?>">Download Notes</a>
                                    <a class="dropdown-item" href="note-details-admin.php?id=<?php echo $note_id ?>">View More Details</a>

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

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>