<?php
session_start();
require_once '../includes/rv2.php';
require_once '../includes/rv2_orders.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Admin</title>

		<link rel="stylesheet" href="../../css/foundation.min.css">
		<link rel="stylesheet" href="../../css/header.css">
		<link rel="stylesheet" href="../../css/sidenav.css">
		<link rel="stylesheet" href="../../css/footer.css">
		<link rel="stylesheet" href="../../css/admin.css">
		
	</head>

	<body>

		<?php  include_once "../includes/page_header.php" ?>

		<nav class="sidenav">
			<img src="../../assets/icons/close.png" alt="" class="close">
			<a href="../../index.php#main" class="nav_links">HOME</a>
			<a href="../../image.php" class="nav_links">IMAGE GALLERY</a>
			<a href="../../video.php" class="nav_links">VIDEO GALLERY</a>
			<a href="../../audio.php" class="nav_links">AUDIO GALLERY</a>
			<a href="../../shop.php" class="nav_links">MERCH SHOP</a>
			<a href="../../blog.php" class="nav_links">BLOG</a>
			<div class="smis">
				<a href=""><img src="../../assets/icons/ig_w.png" alt=""></a>
				<a href=""><img src="../../assets/icons/tw_w.png" alt=""></a>
				<a href=""><img src="../../assets/icons/fb_w.png" alt=""></a>
			</div>
		</nav>

		<main>

			<section id="actions" class="grid-x">
				
				<!-- IMAGE UPLOAD -->
				<div class="cell small-12 medium-6" id="image_actions">
					<form action="../processes/admin_actions.php" method="POST" enctype="multipart/form-data" id="image_upload_form">
						<h1>IMAGE UPLOAD</h1>
						<input type="file" name="file[]" accept=".jpg, .jpeg, .png, .gif" multiple class="file_input">
						<input type="submit" value="UPLOAD" name="upload_image" class="submit_btn">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['img_upload_success'])){
								echo '<p>'.$_SESSION['img_upload_success'].'</p>';
								unset($_SESSION['img_upload_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['img_upload_fail'])){
								echo '<p>'.$_SESSION['img_upload_fail'].'</p>';
								unset($_SESSION['img_upload_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- IMAGE DELETE -->
				<div class="cell small-12 medium-6">
					<form action="../processes/admin_actions.php" method="POST" id="image_delete_form">
						<h1>DELETE IMAGE</h1>
						<input type="text" name="filename" placeholder="Enter the image filename">
						<input type="submit" value="DELETE" name="delete_image" class="submit_btn del">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['img_delete_success'])){
								echo '<p>'.$_SESSION['img_delete_success'].'</p>';
								unset($_SESSION['img_delete_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['img_delete_fail'])){
								echo '<p>'.$_SESSION['img_delete_fail'].'</p>';
								unset($_SESSION['img_delete_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- VIDEO UPLOAD -->
				<div class="cell small-12 medium-6" id="video_actions">
					<form action="../processes/admin_actions.php" method="POST" enctype="multipart/form-data" id="video_upload_form">
						<h1>UPLOAD VIDEO</h1>
						<input type="file" name="file" accept="video/*" class="file_input">
						<input type="text" name="video_title" placeholder="Enter video title">
						<input type="text" name="video_date" placeholder="Enter video upload date">
						<input type="submit" value="UPLOAD" name="upload_video" class="submit_btn">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['video_upload_success'])){
								echo '<p>'.$_SESSION['video_upload_success'].'</p>';
								unset($_SESSION['video_upload_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['video_upload_fail'])){
								echo '<p>'.$_SESSION['video_upload_fail'].'</p>';
								unset($_SESSION['video_upload_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- VIDEO DELETE -->
				<div class="cell small-12 medium-6">
					<form action="../processes/admin_actions.php" method="POST" id="video_delete_form">
						<h1>DELETE VIDEO</h1>
						<input type="text" name="filename" placeholder="Enter the video filename">
						<input type="submit" value="DELETE" name="delete_video" class="submit_btn del">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['video_delete_success'])){
								echo '<p>'.$_SESSION['video_delete_success'].'</p>';
								unset($_SESSION['video_delete_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['video_delete_fail'])){
								echo '<p>'.$_SESSION['video_delete_fail'].'</p>';
								unset($_SESSION['video_delete_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- AUDIO UPLOAD -->
				<div class="cell small-12 medium-6" id="audio_actions">
					<form action="../processes/admin_actions.php" method="POST" enctype="multipart/form-data" id="audio_upload_form">
						<h1>UPLOAD AUDIO</h1>
						<label for="">CHOOSE AUDIO</label>
						<input type="file" name="audio_file" accept="audio/mpeg" class="file_input">
						<label for="">CHOOSE POSTER</label>
						<input type="file" name="img_file" accept=".jpg, .jpeg, .png, .gif" class="file_input">
						<input type="text" name="audio_title" placeholder="Enter audio title">
						<input type="text" name="audio_date" placeholder="Enter audio upload date">
						<input type="submit" value="UPLOAD" name="upload_audio" class="submit_btn">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['audio_upload_success'])){
								echo '<p>'.$_SESSION['audio_upload_success'].'</p>';
								unset($_SESSION['audio_upload_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['audio_upload_fail'])){
								echo '<p>'.$_SESSION['audio_upload_fail'].'</p>';
								unset($_SESSION['audio_upload_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- AUDIO DELETE -->
				<div class="cell small-12 medium-6">
					<form action="../processes/admin_actions.php" method="POST" id="audio_delete_form">
						<h1>DELETE AUDIO</h1>
						<input type="text" name="filename" placeholder="Enter the audio filename">
						<input type="submit" value="DELETE" name="delete_audio" class="submit_btn del">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['audio_delete_success'])){
								echo '<p>'.$_SESSION['audio_delete_success'].'</p>';
								unset($_SESSION['audio_delete_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['audio_delete_fail'])){
								echo '<p>'.$_SESSION['audio_delete_fail'].'</p>';
								unset($_SESSION['audio_delete_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- PRODUCT ADDITION -->
				<div class="cell small-12 medium-6" id="product_actions">
					<form action="../processes/admin_actions.php" method="POST" enctype="multipart/form-data" id="product_addition_form">
						<h1>ADD A PRODUCT</h1>
						<label for="">PRODUCT IMAGE</label>
						<input type="file" name="file" accept=".jpg, .jpeg, .png, .gif" class="file_input">
						<input type="text" name="product_name" placeholder="Product name">
						<input type="text" name="product_price" placeholder="Product price">
						<input type="text" name="product_category" placeholder="Product category">
						<p style="padding: 0 0 4vh 0;">artwork / shoes / smoke_bombs</p>
						<input type="submit" value="ADD" name="add_product" class="submit_btn">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['product_addition_success'])){
								echo '<p>'.$_SESSION['product_addition_success'].'</p>';
								unset($_SESSION['product_addition_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['product_addition_fail'])){
								echo '<p>'.$_SESSION['product_addition_fail'].'</p>';
								unset($_SESSION['product_addition_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- PRODUCT REMOVAL -->
				<div class="cell small-12 medium-6">
					<form action="../processes/admin_actions.php" method="POST" enctype="multipart/form-data" id="product_removal_form">
						<h1>REMOVE A PRODUCT</h1>
						<input type="text" name="product_category" placeholder="Product category">
						<p style="padding: 0 0 4vh 0;">artwork / shoes / smoke_bombs</p>
						<input type="text" name="product_name" placeholder="Product name">
						<input type="submit" value="REMOVE" name="remove_product" class="submit_btn del">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['product_removal_success'])){
								echo '<p>'.$_SESSION['product_removal_success'].'</p>';
								unset($_SESSION['product_removal_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['product_removal_fail'])){
								echo '<p>'.$_SESSION['product_removal_fail'].'</p>';
								unset($_SESSION['product_removal_fail']);
							}
							?>
						</div>
					</div>
				</div>

				<!-- ARTICLE ADDITION -->
				<div class="cell small-12 medium-6" id="article_actions">
					<form action="../processes/admin_actions.php" method="POST" enctype="multipart/form-data" id="article_addition_form">
						<h1>ADD AN ARTICLE</h1>
						<input type="text" name="cat" placeholder="Article Category">
						<p style="padding: 0 0 4vh 0;">feature_articles / general_news / environmental_awareness</p>
						<input type="text" name="author" placeholder="Author(s)">
						<label for="">AUTHOR PIC</label>
						<input type="file" name="author_pic" accept=".jpg, .jpeg, .png, .gif" class="file_input">
						<label for="">ARTICLE IMAGE</label>
						<input type="file" name="hero_image" accept=".jpg, .jpeg, .png, .gif" class="file_input">
						<input type="text" name="title" placeholder="Title">
						<input type="text" name="sub_title" placeholder="Subtitle">
						<input type="text" name="post_date" placeholder="Post Date">
						<input type="text" name="length" placeholder="Estimated Read Length">
						<textarea name="atcl_text" cols="30" rows="10" placeholder="Article Text"></textarea>
						<input type="submit" value="ADD" name="add_article" class="submit_btn">
					</form>
					<div class="form_message">
						<div class="success">
							<?php
							if(isset($_SESSION['article_addition_success'])){
								echo '<p>'.$_SESSION['article_addition_success'].'</p>';
								unset($_SESSION['article_addition_success']);
							}
							?>
						</div>
						<div class="fail">
							<?php
							if(isset($_SESSION['article_addition_fail'])){
								echo '<p>'.$_SESSION['article_addition_fail'].'</p>';
								unset($_SESSION['article_addition_fail']);
							}
							?>
						</div>
					</div>
				</div>

			</section>

			<section id="orders">

				<h1>PRODUCT ORDERS</h1>

				<div class="grid-x head">
					<div class="cell medium-3">
						<p>NAME</p>
					</div>
					<div class="cell medium-3">
						<p>CONTACT</p>
					</div>
					<div class="cell medium-3">
						<p>PRODUCT(S)</p>
					</div>
					<div class="cell medium-3">
						<p>TOTAL</p>
					</div>
				</div>

				<?php

				echo '<div class="grid-x">';

				$name_sql = "SELECT customer_name FROM orders GROUP BY customer_name ORDER BY (id) ASC";
				$name_qry = mysqli_query($connect_rv2_orders, $name_sql);

				while($row = mysqli_fetch_array($name_qry)){

					$customer_name = $row[0];

					echo '<div class="cell medium-3">
								<p>'.$customer_name.'</p></div>';

					$contact_sql = "SELECT customer_contact FROM orders WHERE customer_name='$customer_name' GROUP BY customer_contact";
					$contact_qry = mysqli_query($connect_rv2_orders, $contact_sql);

					while($row = mysqli_fetch_array($contact_qry)){

						$customer_contact = $row[0];

						echo '<div class="cell medium-3">
								<p>'.$customer_contact.'</p></div>';

						$products_sql = "SELECT product_name FROM orders WHERE customer_name='$customer_name'";
						$products_qry = mysqli_query($connect_rv2_orders, $products_sql);
						$products = '';

						while($row = mysqli_fetch_array($products_qry)){

							$product = $row[0];
							$products .= $product.', ';
							
						}

						echo '<div class="cell medium-3">
								<p>'.$products.'</p></div>';

						$total_sql = "SELECT product_price FROM orders WHERE customer_name='$customer_name'";
						$total_qry = mysqli_query($connect_rv2_orders, $total_sql);
						$total = 0;

						while($row = mysqli_fetch_array($total_qry)){
							$product_price = $row[0];
							$total += $product_price;
						}

						echo '<div class="cell medium-3">
								<p>KES '.$total.'</p></div>';
					}
				}

				echo '</div>';

				?>

			</section>

		</main>

		<footer class="grid-x">
			<div class="cell small-12 medium-8 foot_links">
				<a href="../../index.php#main">HOME</a><br>
				<a href="../../image.php">IMAGE GALLERY</a><br>
				<a href="../../video.php">VIDEO GALLERY</a><br>
				<a href="../../audio.php">AUDIO GALLERY</a><br>
				<a href="../../shop.php">MERCH SHOP</a><br>
				<a href="../../blog.php">BLOG</a><br>
			</div>
			<div class="cell small-12 medium-4 foot_smis">
				<a href=""><img src="../../assets/icons/ig_w.png" alt=""></a>
				<a href=""><img src="../../assets/icons/tw_w.png" alt=""></a>
				<a href=""><img src="../../assets/icons/fb_w.png" alt=""></a>
			</div>
		</footer>

		<script src="../../js/vendor/jquery.js"></script>
    <script src="../../js/vendor/what-input.js"></script>
    <script src="../../js/vendor/foundation.min.js"></script>
    <script src="../../js/app.js"></script>
    <script src="../../js/smooth_scroll.js"></script>
    <script src="../../js/animations.js"></script>

	</body>
</html>