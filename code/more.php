<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Blog : more</title>

		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/more.css">
		
	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>

			<section class="container">
				<div class="grid-x article_list">

					<?php
					$cat = $_GET['cat'];

					function render_content($table){
						$connect = mysqli_connect('localhost', 'root', '', 'rv2_articles');
						$select = "SELECT * FROM $table ORDER BY id DESC";
						$query = mysqli_query($connect, $select);
						while($row = mysqli_fetch_array($query)){
							$hero_image = $row['hero_image'];
							$title = $row['title'];
							$sub_title = $row['sub_title'];
							$author_pic = $row['author_pic'];
							$author = $row['author'];
							$post_date = $row['post_date'];
							$length = $row['length'];
							$atcl_text = $row['atcl_text'];
							$likes = $row['likes'];
							$comments = $row['comments'];
							$article_id = $row['id'];
							$cat = $_GET['cat'];

							echo '<div class="cell medium-4">';
							echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">
										<div class="cont">
										<h2 class="title">'.$title.'</h2>
										<hr>
										<p class="subtitle">'.$sub_title.'</p>
										</div>
										<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
										</div>';
						}
					}

					switch ($cat) {
						case 'fa':
							render_content('feature_articles');
							break;

						case 'gn':
							render_content('general_news');
							break;

						case 'ea':
							render_content('environmental_awareness');
							break;
						
						default:
							break;
					}
					?>
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