<?php include "db_connection.php";

?>


<html>

<head>
	<!--meta tages-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<meta charset="UTF-8">
	<!--title-->
	<title>Notes Marketplace</title>
	<!--favicon-->
	<link rel="shortcut icon" href="img/home/favicon.ico">

	<!--google fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--fontawesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<!--bootstrap-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--star-->
	<link rel="stylesheet" href="css/jsRapStar.css">
	<!--custom css-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<!--custom jquery-->
	<script src="js/jquery.min.js"></script>
	<script src="js/jsRapStar.js"></script>


	<script type="text/javascript">
		function search(page) {
			var search_input = $("#searchbar").val();
			var search_type = $("#type_search").val();
			var search_category = $("#category_search").val();
			var search_university = $("#university_search").val();
			var search_course = $("#course_search").val();
			var search_country = $("#country_search").val();
			var search_rating = $("#rating_search").val();

			$.ajax({
				type: "GET",
				url: "AJAX/search_ajax.php",
				data: {
					searchbar: search_input,
					typedrop: search_type,
					categorydrop: search_category,
					universitydrop: search_university,
					coursedrop: search_course,
					countrydrop: search_country,
					ratingdrop: search_rating,
					page: page
				},
				success: function(data) {
					$("#search-ajax").html(data);
				}


			});
		}


		$(document).ready(function() {
			search(1);
		});
	</script>


</head>

<body>


	<?php include "nav.php"; ?>


	<section id="searchnote">
		<div class="content-box-lg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-12">
						<div id="search-statement" class="text-center">
							<h3>Search Notes</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="notefilter">
		<div class="container">
			<div class="row">
				<h4>search and filter notes</h4>
			</div>
		</div>

		<div class="container gray-color">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<input type="text" id="searchbar" onkeyup="search();" placeholder='  &#xf002   Search Notes here...' />
				</div>
			</div>
			<div class="row">
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<select id="type_search" onchange="search();" class="form-control dropdown arrow-down">
						<?php
						$query_type = "select * from note_type WHERE isactive=1";
						$result = mysqli_query($conn, $query_type);
						echo "<option value='0' selected disabled>select Type</option>";
						while ($row = mysqli_fetch_assoc($result)) {
							$type_id = $row['type_id'];
							$type_name = $row['type_name'];

							echo "<option value='$type_id'>$type_name</option>";
						}
						?>
					</select>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<select id="category_search" onchange="search();" class="form-control dropdown arrow-down">
						<?php
						$query_category = mysqli_query($conn, "SELECT * FROM note_categories WHERE isactive=1");
						echo "<option value='0' selected disabled>Select Category</option>";
						while ($row = mysqli_fetch_assoc($query_category)) {
							$category_id = $row['note_categories_id'];
							$category_name = $row['category_name'];
							echo "<option value='$category_id'>$category_name</option>";
						}
						?>
					</select>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<select id="university_search" onchange="search();" class="form-control dropdown arrow-down">

						<?php
						$query_university = mysqli_query($conn, "SELECT DISTINCT university_name FROM seller_notes");
						echo "<option value='0' selected disabled>select university</option>";
						while ($row = mysqli_fetch_assoc($query_university)) {
							// $profile_id = $row['profile_id'];
							$university = $row['university_name'];
							if (!empty($university) && $university != "") {
								echo "<option value='$university'>$university</option>";
							}
						}

						?>
					</select>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<select id="course_search" onchange="search();" class="form-control dropdown arrow-down">

						<?php
						$query_course = mysqli_query($conn, "SELECT DISTINCT course FROM seller_notes");
						echo "<option value='0' selected disabled>Select Course</option>";
						while ($row = mysqli_fetch_assoc($query_course)) {
							$course = $row['course'];
							if (!empty($course) && $course != "") {
								echo "<option value='$course'>$course</option>";
							}
						}

						?>
					</select>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<select id="country_search" onchange="search();" class="form-control dropdown arrow-down">

						<?php
						$query_country = mysqli_query($conn, "SELECT * FROM countries WHERE isactive=1");
						echo "<option value='0' selected disabled>select country</option>";
						while ($row = mysqli_fetch_assoc($query_country)) {
							$country_name = $row['country_name'];
							$country_id = $row['country_id'];
							echo "<option value='$country_id'>$country_name</option>";
						}

						?>
					</select>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6 col-12">
					<select id="rating_search" value='0' onchange="search();" class="form-control dropdown arrow-down">
						<option selected disabled>Select Rating</option>
						<option value="5">5</option>
						<option value="4">4</option>
						<option value="3">3</option>
						<option value="2">2</option>
						<option value="1">1</option>
					</select>
				</div>
			</div>
		</div>
	</section>

	<div id="search-ajax"></div>

	<!--footer-->

	<?php include "footer.php"; ?>


	<!--bootstrap-->
	<script src="js/bootstrap/bootstrap.min.js"></script>

	<script src="js/script.js"></script>
</body>

</html>