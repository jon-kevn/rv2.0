<?php
require_once 'php/includes/rv2.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Ronny Onkeo | Audio</title>
		
		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/audio.css">
		
	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>
			<section id="gallery" class="grid-x">

				<?php
				$select = "SELECT * FROM audio ORDER BY (id) DESC";
				$query = mysqli_query($connect, $select);
				while($row = mysqli_fetch_array($query)){
					$audio_file_name = $row['filename'];
					$audio_title = $row['title'];
					$audio_date = $row['up_date'];
					$audio_poster = $row['poster'];
					echo '<div class="cell small-12 medium-6">';
					echo '<img src="assets/audio_gallery/posters/'.$audio_poster.'" alt="" class="poster">
								<h1>'.$audio_title.'</h1>
								<p>'.$audio_date.'</p>
								<audio controls>
									<source src="assets/audio_gallery/audio_files/'.$audio_file_name.'" type="audio/mpeg">
								</audio></div>';
				}
				?>

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