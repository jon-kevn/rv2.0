<?php
require_once 'php/includes/rv2.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Videos</title>

		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/video.css">

	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>
			<section id="gallery">

				<div class="grid-x">
					<?php
					$select = "SELECT * FROM videos ORDER BY (id) DESC";
					$query = mysqli_query($connect, $select);
					while($row = mysqli_fetch_array($query)){
						$video_file_name = $row['filename'];
						$video_title = $row['title'];
						$video_date = $row['up_date'];
						echo '<div class="cell small-12 medium-7 vid_box">';
						echo '<video muted loop>
										<source src="assets/video_gallery/'.$video_file_name.'" type="video/mp4">
									</video></div>';
						echo '<div class="cell small-12 medium-5 title_box">';
						echo '<h1>'.$video_title.'</h1>
									<p>'.$video_date.'</p>
									<p class="play" data-vid="assets/video_gallery/'.$video_file_name.'">Play Video</p></div>';
					}
					?>
				</div>

			</section>

			<section id="vid_player">
				<img src="assets/icons/close_w.png" alt="" class="close">
				<div class="vid_cont">
				</div>
			</section>

		</main>

		<?php  include_once "php/includes/footer.php" ?>

		<script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/smooth_scroll.js"></script>
    <script src="js/animations.js"></script>

	</body>
</html>