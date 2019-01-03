<?php
session_start();

// GENERATING USER TOKEN
$bytes = 16;
$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes($bytes));
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Home</title>

		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/style.css">

	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>

		<?php  include_once "php/includes/sidenav.php" ?>

		<video id="vid_bg" poster="assets/images/landing_bg.jpg" autoplay muted loop>
			<source src="assets/videos/landing_bg.mp4" type="video/mp4">
		</video>

		<main id="main">

			<section id="banner" class="grid-y">

				<div class="cell" id="name_box">
					<h1 class="name">RONNY ONKEO</h1>
				</div>

				<div class="cell" id="tag_box">
					<h2 class="tagline">PHOTOGRAPHER | VIDEOGRAPHER</h2>
				</div>

			</section>

			<section id="info" class="grid-x">

				<img src="assets/images/profile.png" alt="" class="profile">

				<div class="cell medium-9 small-12" id="bio_box">

					<p id="bio"><span>I am</span> a passionate photo and video specialist blessed to work with some incredibly talented people on the quest to capture powerful moments and create inspirational content. Contact me to setup a shoot.</p>

					<a href="assets/files/quotation.pdf" download class="call_out">View Quotation</a>

					<p class="contact"><strong>Mobile -</strong> +254 705 488406 <span>|</span> <strong>Email -</strong> ronnyonkeo@gmail.com</p>

				</div>

				<div class="cell medium-3 small-12" id="smi_box">
					<a href="https://www.instagram.com/ronnyonkeo/" target="_instagram"><img src="assets/icons/ig.png" alt="" class="smis"></a><br>
					<a href="https://twitter.com/OnkeoRonny" target="_twitter"><img src="assets/icons/tw.png" alt="" class="smis"></a><br>
					<a href="https://www.facebook.com/RonnyOnkeo" target="_facebook"><img src="assets/icons/fb.png" alt="" class="smis"></a><br>
					<a href="https://www.behance.net/onkeoronny9291" target="_behance"><img src="assets/icons/be.png" alt="" class="smis"></a>
				</div>

			</section>

			<section id="work" class="grid-x">

				<h1 class="section_title">MY WORK</h1>
				
				<div class="cell small-12 medium-4">
					<a href="image.php" class="work_links">
						<img src="assets/icons/image.png" alt="">
						<div></div>
						<h1>IMAGE</h1>
						<p>From portraits to social events, I shoot captivating moments focused on the merging of people and scenery.</p>
					</a>
				</div>
				
				<div class="cell small-12 medium-4">
					<a href="video.php" class="work_links">
						<img src="assets/icons/video.png" alt="">
						<h1>VIDEO</h1>
						<p>Music videos, merchandise videos, interviews, mini-documentaries, promotions... YOU NAME IT! I got the hook up.</p>
					</a>
				</div>
				
				<div class="cell small-12 medium-4">
					<a href="audio.php" class="work_links">
						<img src="assets/icons/audio.png" alt="">
						<h1>AUDIO</h1>
						<p>Inspirational podcasts featuring the best tidbits to personal accomplishment from successful public figures. Have a listen</p>
					</a>
				</div>
				
			</section>

			<section id="shop">

				<h1 class="section_title">MERCH SHOP</h1>
				
				<div class="grid-x product">
					<div class="cell small-12 medium-6 img_cell">
						<img src="assets/images/sneaker_shop5.jpg" style="margin: 10vh 0 0 0;">
					</div>
					<div class="cell small-12 medium-6">
						<p class="description">Make a statement with a fresh pair of <span id="sneakers" class="shop_link">sneakers</span>.</p>
					</div>
				</div>

				<div class="grid-x product alt">
					<div class="cell small-12 medium-6">
						<p class="description">Paint the city red (or whatever color really) with a BLAST (get it, blast.. :D) of color from our quality <span id="smoke_bombs" class="shop_link">smoke bombs</span>.</p>
					</div>
					<div class="cell small-12 medium-6 img_cell">
						<img src="assets/images/smoke5.jpeg" style="margin: 10vh 0 0 0;">
					</div>
				</div>

				<div class="grid-x product">
					<div class="cell small-12 medium-6 img_cell">
						<img src="assets/images/art5.jpg" style="margin: 10vh 0 0 0;">
					</div>
					<div class="cell small-12 medium-6">
						<p class="description">Spruce up your favorite space with a stunning piece of <span id="photo_art" class="shop_link">photo art</span>.</p>
					</div>
				</div>

				<div class="cont">
					<a href="shop.php" class="call_out">START SHOPPING</a>
				</div>

			</section>

			<section id="shop_mobi">

				<h1>MERCH SHOP</h1>

				<img src="assets/images/sneaker_shop5.jpg" alt="">
				<p>Make a statement with a fresh pair of <a href="" id="sneakers">sneakers</a>.</p>

				<img src="assets/images/smoke5.jpeg" alt="">
				<p>Paint the city red (or whatever color really) with a BLAST (get it, blast.. :D) of color from our quality <a href="" id="smoke_bombs">smoke bombs</a>.</p>

				<img src="assets/images/art5.jpg" alt="">
				<p>Spruce up your favorite space with a stunning piece of <a href="" id="photo_art">photo art</a>.</p>

			</section>

			<section id="blog">
				<h1 class="section_title">BLOG</h1>
				<img src="assets/images/blog.jpg" alt="" class="hero">
				<div class="container">
					<p class="text">Catch an amazing read from our informative and eye opening blog.</p><br>
					<a href="blog.php" class="call_out">VISIT BLOG</a>
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
    <script src="js/shop_links.js"></script>

	</body>
</html>