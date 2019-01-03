<?php
require_once 'php/includes/rv2.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Images</title>

		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/image.css">
		
	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>

			<section id="gallery">
				
				<?php
				$select = "SELECT * FROM images ORDER BY (id) DESC";
				$query = mysqli_query($connect, $select);
				while($row = mysqli_fetch_array($query)){
					$image_file_name = $row['filename'];
					echo '<img src="assets/image_gallery/'.$image_file_name.'" alt="">';
				}
				?>

			</section>

			<section id="light_box">
				<img src="assets/image_gallery/2.jpg" alt="">
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