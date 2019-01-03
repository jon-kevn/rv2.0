<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Checkout</title>

		<link rel="stylesheet" href="../../css/foundation.min.css">
		<link rel="stylesheet" href="../../css/header.css">
		<link rel="stylesheet" href="../../css/sidenav.css">
		<link rel="stylesheet" href="../../css/footer.css">
		<link rel="stylesheet" href="../../css/checkout.css">
		
	</head>

	<body>

		<?php  include_once "../includes/page_header.php" ?>
		<?php  include_once "../includes/page_sidenav.php" ?>

		<main>

			<section id="thanks">
				<h2><em>Thank you for your purchase <span><?php echo $_SESSION['customer_name']; ?></span>, you will be contacted for delivery and payment arrangements.</em></h2>
			</section>

		</main>

		<?php  include_once "../includes/page_footer.php" ?>

		<script src="../../js/vendor/jquery.js"></script>
    <script src="../../js/vendor/what-input.js"></script>
    <script src="../../js/vendor/foundation.min.js"></script>
    <script src="../../js/app.js"></script>
    <script src="../../js/smooth_scroll.js"></script>
    <script src="../../js/animations.js"></script>

	</body>
</html>