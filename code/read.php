<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Blog : Read</title>

		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/read.css">
		
	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>
			<?php
			
			$cat = $_GET['cat'];

			function render_content($table) {
				$article_id = $_GET['article'];
				$connect = mysqli_connect('localhost', 'root', '', 'rv2_articles');
				$select = "SELECT * FROM $table WHERE id = '$article_id'";
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

					echo '<div id="hero" style="background-image: url(\'assets/images/'.$hero_image.'\');"></div>';
					echo '<div id="cover">
								<h1 id="title">'.$title.'</h1>
								<hr>
								<h2 id="subtitle">'.$sub_title.'</h2>
								</div>';
					echo '<section id="article">
								<p class="text">'.$atcl_text.'</p>
								<hr>
								<div class="author">
								<img src="assets/images/'.$author_pic.'" alt="" class="pic">
								<p class="name">'.$author.'</p>
								<p class="date">'.$post_date.'</p>
								</div>
								<div class="reader_actions">
								<div class="like_n_share">
								<i class="fas fa-heart fa-3x" id="like" title="Like"></i>
								<i class="fab fa-instagram fa-3x" title="Share on Ig"></i>
								<i class="fab fa-twitter fa-3x" title="Share on Twitter"></i>
								<i class="fab fa-facebook-f fa-3x" title="Share on Facebook"></i>
								</div>
								<div class="comment">
								<form action="" method="post">
									<textarea name="" id="" placeholder="Leave a comment"></textarea>
									<input type="submit" value="SEND" class="submit_comment">
								</form>
								</div>
								</div>
								</section>';
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