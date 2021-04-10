<?php include "../db_connection.php";

if (isset($_GET['searchbar'])) {
	$search1 = $_GET['searchbar'];
} else {
	$search1 = "";
}

if (isset($_GET['typedrop'])) {
	$type1 = $_GET['typedrop'];
} else {
	$type1 = "";
}

if (isset($_GET['categorydrop'])) {
	$category1 = $_GET['categorydrop'];
} else {
	$category1 = "";
}

if (isset($_GET['universitydrop'])) {
	$university1 = $_GET['universitydrop'];
} else {
	$university1 = "";
}

if (isset($_GET['coursedrop'])) {
	$course1 = $_GET['coursedrop'];
} else {
	$course1 = "";
}

if (isset($_GET['countrydrop'])) {
	$country1 = $_GET['countrydrop'];
} else {
	$country1 = "";
}

if (isset($_GET['ratingdrop'])) {
	$rating1 = $_GET['ratingdrop'];
} else {
	$rating1 = "";
}

$query = "SELECT DISTINCT seller_notes.seller_note_id, seller_notes.note_title, seller_notes.category,
 seller_notes.note_type, seller_notes.university_name, seller_notes.display_picture, seller_notes.num_of_pages,
 seller_notes.publisheddate, seller_notes.course, seller_notes.country FROM seller_notes LEFT JOIN seller_notes_review ON 
 seller_notes.seller_note_id=seller_notes_review.note_id WHERE seller_notes.status=9 AND note_title LIKE '%$search1%'";

$append_query = " ";

if (!empty(isset($_GET['typedrop'])) && !empty($_GET['typedrop']) && $_GET['typedrop'] != 0) {
	$append_query .= " AND note_type = '$type1'";
}
if (!empty(isset($_GET['categorydrop'])) && !empty($_GET['categorydrop']) && $_GET['categorydrop'] != 0) {
	$append_query .= " AND category = '$category1'";
}
if (!empty(isset($_GET['universitydrop'])) && !empty($_GET['universitydrop']) && $_GET['universitydrop'] != 0) {
	$append_query .= " AND university_name = '$university1'";
}
if (!empty(isset($_GET['coursedrop'])) && !empty($_GET['coursedrop']) && $_GET['coursedrop'] != 0) {
	$append_query .= " AND course = '$course1'";
}
if (!empty(isset($_GET['countrydrop'])) && !empty($_GET['countrydrop']) && $_GET['countrydrop'] != 0) {
	$append_query .= " AND country = '$country1'";
}
if (!empty(isset($_GET['ratingdrop'])) && !empty($_GET['ratingdrop']) && $_GET['ratingdrop'] != 0) {
	$append_query .= " AND rating > '$rating1'";
}


$limit = 9;

if (isset($_GET["page"])) {
	$page = $_GET["page"];
} else {
	$page = 1;
};
$start_from = ($page - 1) * $limit;

$result_query = $query . $append_query;
$result_append = mysqli_query($conn, $result_query);
$count = mysqli_num_rows($result_append);

$result_query_page = $query . $append_query . " LIMIT " . $start_from . "," . $limit;
$result_append_page = mysqli_query($conn, $result_query_page);

$query_page = "SELECT COUNT(seller_note_id) FROM seller_notes WHERE seller_notes.status=9 AND isactive=1 AND (note_title LIKE '%$search1%'
AND category LIKE '%$category1%' AND country LIKE '%$country1%' AND note_type LIKE '%$type1%' AND
university_name LIKE '%$university1%' AND course LIKE '%$course1%')";

$result_page = mysqli_query($conn, $query_page);

$row_db = mysqli_fetch_row($result_page);
$total_records = $row_db[0];
$total_pages = ceil($total_records / $limit);

?>

<section id="totalnotes">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h3>Total <?php echo $count; ?> notes</h3>
			</div>
		</div>
		<div class="row">

			<?php

			while ($row = mysqli_fetch_assoc($result_append_page)) {
				$display_path = $row['display_picture'];
				$note_title = $row['note_title'];
				$university_name = $row['university_name'];
				$pages = $row['num_of_pages'];
				$date = $row['publisheddate'];
				$noteid = $row['seller_note_id'];

				$query_rating = mysqli_query($conn, "SELECT avg(rating) FROM seller_notes_review WHERE note_id=$noteid");
				while ($row = mysqli_fetch_assoc($query_rating)) {
					$rate = $row['avg(rating)'];
				}
			?>

				<div class="col-lg-4 col-md-6 col-sm-6 col-12">

					<!-- first book-->

					<?php echo "<a href='notedetails.php?id=$noteid' style='text-decoration: none;'>"; ?>
					<?php echo "<img src='$display_path' alt='Book' class='img-fluid note-pic' style='width: 500px; height: 200px;'>"; ?>

					<div class="image-info">
						<ul>
							<li>
								<h5>
									<?php echo "$note_title"; ?>
								</h5>
							</li>
						</ul>
						<div class="result">
							<img src="img/Search/university.png" alt="university">
							<h6 class="result-data">
								<?php echo "$university_name"; ?>
							</h6>
						</div>
						<div class="result">
							<img src="img/Search/pages.png" alt="book">
							<h6 class="result-data">
								<?php echo "$pages"; ?> Pages</h6>
						</div>
						<div class="result">
							<img src="img/Search/calendar.png" alt="calendar">
							<h6 class="result-data">
								<?php echo date('D M d Y', strtotime('$date')); ?>
							</h6>
						</div>
						<div class="result">
							<?php
							$query_inappropriate = mysqli_query($conn, "SELECT * FROM seller_notes_report_issue WHERE note_id=$noteid");
							$count_inappropriate = mysqli_num_rows($query_inappropriate);
							?>
							<img src="img/Search/flag.png" alt="flag">
							<?php
							if ($count_inappropriate == 0) { ?>
								<h6 class="result-red">No Users have marked this note as inappropriate
								</h6>
							<?php } else { ?>
								<h6 class="result-red"><?php echo $count_inappropriate; ?> Users have marked this note as inappropriate
								</h6>
							<?php } ?>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div id="<?php echo $noteid; ?>" start="<?php echo $rate ?>"></div>
							</div>
							<div class="col-md-6">
								<?php
								$review = mysqli_query($conn, "SELECT * FROM seller_notes_review WHERE note_id=$noteid");
								$review_count = mysqli_num_rows($review);
								?>
								<?php
								if ($review_count == 0) { ?>
									<h6 style="margin-top: 17px;">No reviews</h6>
								<?php 	} else { ?>
									<h6 style="margin-top: 17px;"><?php echo $review_count; ?> reviews</h6>
								<?php } ?>
							</div>
						</div>

						<?php if ($rate != 0) { ?>
							<script>
								$('#<?php echo $noteid; ?>').jsRapStar({
									length: 5,
									value: <?php echo $rate; ?>,
									enabled: false
								});
							</script>
						<?php 	} else { ?>
							<script>
								$('#<?php echo $noteid; ?>').jsRapStar({
									length: 5,
									value: 0,
									enabled: false
								});
							</script>
						<?php } ?>

					</div>
					</a>
				</div>

			<?php } ?>
		</div>
		<div class="row">
			<div class="col-md-12">

				<ul class='pagination justify-content-center'>
					<?php
					echo "<li class='page-item' style='list-style:none'><button onclick='search(" . ($page - 1) . ");' class='page-link'>❮</button></li>";

					for ($i = 1; $i <= $total_pages; $i++) {

						if ($i == $page) {
							echo "<li class='page-item active'><button class='page-link' onclick='search(" . $i . ");'>" . $i . "</button></li>";
						} else {
							echo "<li class='page-item' style='list-style:none'><button class='page-link' onclick='search(" . $i . ");'>" . $i . "</button></li>";
						}
					}

					echo "<li class='page-item'><button onclick='search(" . ($page + 1) . ");' class='page-link'>❯</button></li>";
					?>
				</ul>
			</div>
		</div>
	</div>
</section>