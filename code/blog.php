<?php
require_once 'php/includes/rv2_articles.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ronny Onkeo | Blog</title>
		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/blog.css">
	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>

			<section id="feature_articles">

				<h1 class="section_title">FEATURE ARTICLES</h1>

				<div class="articles">

					<div class="article one active">

						<?php
						$select = "SELECT * FROM feature_articles ORDER BY (id) DESC LIMIT 1";
						$query = mysqli_query($connect_rv2_articles, $select);
						while($row = mysqli_fetch_array($query)){
							$hero_image = $row['hero_image'];
							$title = $row['title'];
							$sub_title = $row['sub_title'];
							$author_pic = $row['author_pic'];
							$author = $row['author'];
							$post_date = $row['post_date'];
							$length = $row['length'];
							$article_id = $row['id'];
							$cat = 'fa';

							echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
							echo '<div class="details">';
							echo '<h1 class="title">'.$title.'</h1>
										<hr>
										<p class="subtitle">'.$sub_title.'</p>
										<div class="info">
										<img src="assets/images/'.$author_pic.'" alt="" class="pic">
										<p class="writer">'.$author.'</p>
										<p class="date_n_length">'.$post_date.' - '.$length.' read</p>
										</div>
										</div>
										<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
										<p class="article_no">1</p>';
						}
						?>

					</div>

					<div class="article two">

						<?php
						$select = "SELECT * FROM feature_articles ORDER BY (id) DESC LIMIT 1, 1";
						$query = mysqli_query($connect_rv2_articles, $select);
						while($row = mysqli_fetch_array($query)){
							$hero_image = $row['hero_image'];
							$title = $row['title'];
							$sub_title = $row['sub_title'];
							$author_pic = $row['author_pic'];
							$author = $row['author'];
							$post_date = $row['post_date'];
							$length = $row['length'];
							$article_id = $row['id'];
							$cat = 'fa';

							echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
							echo '<div class="details">';
							echo '<h1 class="title">'.$title.'</h1>
										<hr>
										<p class="subtitle">'.$sub_title.'</p>
										<div class="info">
										<img src="assets/images/'.$author_pic.'" alt="" class="pic">
										<p class="writer">'.$author.'</p>
										<p class="date_n_length">'.$post_date.' - '.$length.' read</p>
										</div>
										</div>
										<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
										<p class="article_no">2</p>';
						}
						?>

					</div>

					<div class="article three">
						<?php
						$select = "SELECT * FROM feature_articles ORDER BY (id) DESC LIMIT 2, 1";
						$query = mysqli_query($connect_rv2_articles, $select);
						while($row = mysqli_fetch_array($query)){
							$hero_image = $row['hero_image'];
							$title = $row['title'];
							$sub_title = $row['sub_title'];
							$author_pic = $row['author_pic'];
							$author = $row['author'];
							$post_date = $row['post_date'];
							$length = $row['length'];
							$article_id = $row['id'];
							$article_id = $row['id'];
							$cat = 'fa';

							echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
							echo '<div class="details">';
							echo '<h1 class="title">'.$title.'</h1>
										<hr>
										<p class="subtitle">'.$sub_title.'</p>
										<div class="info">
										<img src="assets/images/'.$author_pic.'" alt="" class="pic">
										<p class="writer">'.$author.'</p>
										<p class="date_n_length">'.$post_date.' - '.$length.' read</p>
										</div>
										</div>
										<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
										<p class="article_no">3</p>
										<a href="more.php?cat='.$cat.'" class="more">more</a>';
						}
						?>
						
					</div>

				</div>

				<div class="slide_control">
					<p id="one" class="active"></p>
					<p id="two"></p>
					<p id="three"></p>
				</div>

			</section>

			<section id="feature_articles_mobi">

				<h1 class="section_title">FEATURE ARTICLES</h1>

				<?php
				$select = "SELECT * FROM feature_articles ORDER BY (id) DESC LIMIT 1";
				$query = mysqli_query($connect_rv2_articles, $select);
				while($row = mysqli_fetch_array($query)){
					$hero_image = $row['hero_image'];
					$title = $row['title'];
					$sub_title = $row['sub_title'];
					$author_pic = $row['author_pic'];
					$author = $row['author'];
					$post_date = $row['post_date'];
					$length = $row['length'];
					$article_id = $row['id'];
					$cat = 'fa';

					echo '<div class="article one">';
					echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
					echo '<div class="details">
								<h1 class="title">'.$title.'</h1>
								<hr>
								<p class="subtitle">'.$sub_title.'</p>
								<img src="assets/images/'.$author_pic.'" alt="" class="author_pic">
								<p class="author">'.$author.'</p>
								<p class="post_date">'.$post_date.'</p>
								<p class="length">'.$length.'</p>
								<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
								</div>
								</div>';
				}

				$select = "SELECT * FROM feature_articles ORDER BY (id) DESC LIMIT 1, 1";
				$query = mysqli_query($connect_rv2_articles, $select);
				while($row = mysqli_fetch_array($query)){
					$hero_image = $row['hero_image'];
					$title = $row['title'];
					$sub_title = $row['sub_title'];
					$author_pic = $row['author_pic'];
					$author = $row['author'];
					$post_date = $row['post_date'];
					$length = $row['length'];
					$article_id = $row['id'];
					$cat = 'fa';

					echo '<div class="article one">';
					echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
					echo '<div class="details">
								<h1 class="title">'.$title.'</h1>
								<hr>
								<p class="subtitle">'.$sub_title.'</p>
								<img src="assets/images/'.$author_pic.'" alt="" class="author_pic">
								<p class="author">'.$author.'</p>
								<p class="post_date">'.$post_date.'</p>
								<p class="length">'.$length.'</p>
								<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
								</div>
								</div>';
				}

				$select = "SELECT * FROM feature_articles ORDER BY (id) DESC LIMIT 2, 1";
				$query = mysqli_query($connect_rv2_articles, $select);
				while($row = mysqli_fetch_array($query)){
					$hero_image = $row['hero_image'];
					$title = $row['title'];
					$sub_title = $row['sub_title'];
					$author_pic = $row['author_pic'];
					$author = $row['author'];
					$post_date = $row['post_date'];
					$length = $row['length'];
					$article_id = $row['id'];
					$cat = 'fa';

					echo '<div class="article one">';
					echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
					echo '<div class="details">
								<h1 class="title">'.$title.'</h1>
								<hr>
								<p class="subtitle">'.$sub_title.'</p>
								<img src="assets/images/'.$author_pic.'" alt="" class="author_pic">
								<p class="author">'.$author.'</p>
								<p class="post_date">'.$post_date.'</p>
								<p class="length">'.$length.'</p>
								<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
								<br>
								<a href="more.php?cat='.$cat.'" class="more">more</a>
								</div>
								</div>';
				}
				?>

			</section>

			<section id="general_news" class="grid_sec">

				<h1 class="section_title">GENERAL NEWS</h1>

				<div class="grid-x">
					<?php
					$select = "SELECT * FROM general_news ORDER BY (id) DESC LIMIT 3";
					$query = mysqli_query($connect_rv2_articles, $select);
					while($row = mysqli_fetch_array($query)){
						$hero_image = $row['hero_image'];
						$title = $row['title'];
						$sub_title = $row['sub_title'];
						$author_pic = $row['author_pic'];
						$author = $row['author'];
						$post_date = $row['post_date'];
						$length = $row['length'];
						$article_id = $row['id'];
						$cat = 'gn';

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
					?>
				</div>

				<a href="more.php?cat=gn" class="more">more</a>

			</section>

			<section id="general_news_mobi">
				
				<h1 class="section_title">GENERAL NEWS</h1>

				<?php
				$select = "SELECT * FROM general_news ORDER BY (id) DESC LIMIT 3";
				$query = mysqli_query($connect_rv2_articles, $select);
				while($row = mysqli_fetch_array($query)){
					$hero_image = $row['hero_image'];
					$title = $row['title'];
					$sub_title = $row['sub_title'];
					$author_pic = $row['author_pic'];
					$author = $row['author'];
					$post_date = $row['post_date'];
					$length = $row['length'];
					$article_id = $row['id'];
					$cat = 'gn';

					echo '<div class="article">';
					echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
					echo '<div class="details">
								<h1 class="title">'.$title.'</h1>
								<hr>
								<p class="subtitle">'.$sub_title.'</p>
								<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
								</div>
								</div>';
				}
				?>

				<a href="more.php?cat=gn" class="more">more</a>

			</section>

			<section id="env_awareness" class="grid_sec">

				<h1 class="section_title">ENVIRONMENTAL AWARENESS</h1>

				<div class="grid-x">
					<?php
					$select = "SELECT * FROM environmental_awareness ORDER BY (id) DESC LIMIT 3";
						$query = mysqli_query($connect_rv2_articles, $select);
						while($row = mysqli_fetch_array($query)){
							$hero_image = $row['hero_image'];
							$title = $row['title'];
							$sub_title = $row['sub_title'];
							$author_pic = $row['author_pic'];
							$author = $row['author'];
							$post_date = $row['post_date'];
							$length = $row['length'];
							$article_id = $row['id'];
							$cat = 'ea';

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
					?>
				</div>

				<a href="more.php?cat=ea" class="more">more</a>
				
			</section>

			<section id="env_awareness_mobi">
				
				<h1 class="section_title">ENVIRONMENTAL AWARENESS</h1>

				<?php
				$select = "SELECT * FROM environmental_awareness ORDER BY (id) DESC LIMIT 3";
				$query = mysqli_query($connect_rv2_articles, $select);
				while($row = mysqli_fetch_array($query)){
					$hero_image = $row['hero_image'];
					$title = $row['title'];
					$sub_title = $row['sub_title'];
					$author_pic = $row['author_pic'];
					$author = $row['author'];
					$post_date = $row['post_date'];
					$length = $row['length'];
					$article_id = $row['id'];
					$cat = 'ea';

					echo '<div class="article">';
					echo '<img src="assets/images/'.$hero_image.'" alt="" class="hero">';
					echo '<div class="details">
								<h1 class="title">'.$title.'</h1>
								<hr>
								<p class="subtitle">'.$sub_title.'</p>
								<a href="read.php?article='.$article_id.'&cat='.$cat.'" class="read_more">READ MORE ></a>
								</div>
								</div>';
				}
				?>

				<a href="more.php?cat=ea" class="more">more</a>

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