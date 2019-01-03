<?php
session_start();

// DB CONNECTIONS
require_once 'php/includes/rv2_products.php';
require_once 'php/includes/rv2_cart.php';
require_once 'php/includes/rv2_orders.php';

// STORING USER TOKEN
$token = $_SESSION['token'];

// CAPTURING ORDERS
if(isset($_POST['place_order'])){
	$product_id = $_POST['id'];
	$product_image = $_POST['image'];
	$product_name = $_POST['name'];
	$product_price = $_POST['price'];
	$bytes = 32;
	$product_hash = bin2hex(openssl_random_pseudo_bytes($bytes));
	$order_sql = "INSERT INTO orders (token, product_id, product_image, product_name, product_price, product_hash) VALUES ('$token', '$product_id', '$product_image', '$product_name', '$product_price', '$product_hash')";
	$qry = mysqli_query($connect_rv2_orders, $order_sql);
}

// REMOVING AN ITEM FROM THE CART
if(isset($_POST['remove_item'])){
	$user_token = $_POST['token'];
	$product_id = $_POST['product_id'];
	$product_hash = $_POST['product_hash'];
	$rmv_sql = "DELETE FROM orders WHERE token='$user_token' AND product_id='$product_id' AND product_hash='$product_hash'";
	$rmv_qry = mysqli_query($connect_rv2_orders, $rmv_sql);
}

// PROCESSING CHECKOUT
if(isset($_POST['process_checkout'])){
	$token = $_SESSION['token'];
	$customer_name = $_POST['customer_name'];
	$customer_contact = $_POST['customer_contact'];
	$_SESSION['customer_name'] = $customer_name;
	$update_sql = "UPDATE orders SET customer_name='$customer_name', customer_contact='$customer_contact' WHERE token='$token'";
	$update_qry = mysqli_query($connect_rv2_orders, $update_sql);
	header('Location: php/pages/checkout.php');
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Ronny Onkeo | Shop</title>

		<link rel="stylesheet" href="css/foundation.min.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/sidenav.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/shop.css">

	</head>

	<body>

		<?php  include_once "php/includes/header.php" ?>
		<?php  include_once "php/includes/sidenav.php" ?>

		<main>
		
			<section class="categories">
				<p class="active shoes_btn">SNEAKERS</p>
				<p class="smoke_bombs_btn">SMOKE BOMBS</p>
				<p class="artwork_btn">ARTWORK</p>
				<?php
				$token = $_SESSION['token'];
				$count_sql = "SELECT * FROM orders WHERE token='$token'";
				$count_qry = mysqli_query($connect_rv2_orders, $count_sql);
				$rows = mysqli_num_rows($count_qry);
				echo '<p class="cart">CART: '.$rows.'</p>';
				?>
			</section>

			<section id="cart">

				<img src="assets/icons/close.png" alt="" class="close">

				<h1>YOUR CART</h1>

				<div class="items">

					<?php
					$token = $_SESSION['token'];
					$select = "SELECT * FROM orders WHERE token='$token' ORDER BY (id) DESC";
					$query = mysqli_query($connect_rv2_orders, $select);
					while($row = mysqli_fetch_array($query)){
						$product_id = $row['product_id'];
						$product_image = $row['product_image'];
						$product_name = $row['product_name'];
						$product_price = $row['product_price'];
						$product_hash = $row['product_hash'];
						echo '<div class="item">';
						echo '<img src="assets/images/'.$product_image.'" alt="">
									<p class="name">'.$product_name.'</p>
									<p class="price">KES '.$product_price.'</p></div>';
						echo '<form action="" method="POST">';
						echo '<input type="hidden" name="token" value="'.$token.'">
									<input type="hidden" name="product_id" value="'.$product_id.'">
									<input type="hidden" name="product_hash" value="'.$product_hash.'">
									<input type="submit" name="remove_item" value="REMOVE" class="remove_btn"></form>';
					}
					
					?>

					<h1 class="order_summary">ORDER SUMMARY</h1>

					<div id="order_summary">
						<p>ITEMS : 
							<?php
							$token = $_SESSION['token'];
							$count_sql = "SELECT * FROM orders WHERE token='$token'";
							$count_qry = mysqli_query($connect_rv2_orders, $count_sql);
							$rows = mysqli_num_rows($count_qry);
							echo $rows;
							?>
						</p>
						<p>TOTAL : KES 
							<?php
							$token = $_SESSION['token'];
							$sum_sql = "SELECT product_price FROM orders WHERE token='$token'";
							$sum_qry = mysqli_query($connect_rv2_orders, $sum_sql);
							$sum = 0;
							while($row = mysqli_fetch_array($sum_qry)){
								$price = $row['product_price'];
								$sum += $price;
							}
							echo $sum;
							?>
						</p>
					</div>

				</div>

				<form action="" method="POST" class="checkout_form">
					<input type="text" name="customer_name" placeholder="NAME" required>
					<input type="text" name="customer_contact" placeholder="PHONE NUMBER" required>
					<input type="submit" name="process_checkout" value="CHECKOUT" class="checkout_btn">
				</form>

			</section>

			<section id="display">

				<div id="shoes" class="grid-x cat_cont">

					<?php
					$select = "SELECT * FROM shoes ORDER BY (id) DESC";
					$query = mysqli_query($connect_rv2_products, $select);
					while($row = mysqli_fetch_array($query)){
						$product_id = $row['id'];
						$product_image = $row['image'];
						$product_name = $row['name'];
						$product_price = $row['price'];
						echo '<div class="cell small-12 medium-4">';
						echo '<img src="assets/images/'.$product_image.'">
									<p class="name">'.$product_name.'</p>
									<p class="price">KES '.$product_price.'</p>
									<form action="" method="POST">
										<input type="hidden" name="id" value="'.$product_id.'">
										<input type="hidden" name="image" value="'.$product_image.'">
										<input type="hidden" name="name" value="'.$product_name.'">
										<input type="hidden" name="price" value="'.$product_price.'">
										<input type="submit" name="place_order" value="ORDER" class="order_btn">
									</form></div>';
					}
					?>

				</div>

				<div id="smoke_bombs" class="grid-x cat_cont">

					<?php
					$select = "SELECT * FROM smoke_bombs ORDER BY (id) DESC";
					$query = mysqli_query($connect_rv2_products, $select);
					while($row = mysqli_fetch_array($query)){
						$product_id = $row['id'];
						$product_image = $row['image'];
						$product_name = $row['name'];
						$product_price = $row['price'];
						echo '<div class="cell small-12 medium-4">';
						echo '<img src="assets/images/'.$product_image.'">
									<p class="name">'.$product_name.'</p>
									<p class="price">KES '.$product_price.'</p>
									<form action="" method="POST">
									<input type="hidden" name="id" value="'.$product_id.'">
										<input type="hidden" name="image" value="'.$product_image.'">
										<input type="hidden" name="name" value="'.$product_name.'">
										<input type="hidden" name="price" value="'.$product_price.'">
										<input type="submit" name="place_order" value="ORDER" class="order_btn">
									</form></div>';
					}
					?>

				</div>

				<div id="artwork" class="grid-x cat_cont">

					<?php
					$select = "SELECT * FROM artwork ORDER BY (id) DESC";
					$query = mysqli_query($connect_rv2_products, $select);
					while($row = mysqli_fetch_array($query)){
						$product_id = $row['id'];
						$product_image = $row['image'];
						$product_name = $row['name'];
						$product_price = $row['price'];
						echo '<div class="cell small-12 medium-4">';
						echo '<img src="assets/images/'.$product_image.'">
									<p class="name">'.$product_name.'</p>
									<p class="price">KES '.$product_price.'</p>
									<form action="" method="POST">
										<input type="hidden" name="id" value="'.$product_id.'">
										<input type="hidden" name="image" value="'.$product_image.'">
										<input type="hidden" name="name" value="'.$product_name.'">
										<input type="hidden" name="price" value="'.$product_price.'">
										<input type="submit" name="place_order" value="ORDER" class="order_btn">
									</form></div>';
					}
					?>
					
				</div>

			</section>

			<section class="categories bottom">
				<p class="active shoes_btn">SNEAKERS</p>
				<p class="smoke_bombs_btn">SMOKE BOMBS</p>
				<p class="artwork_btn">ARTWORK</p>
				<?php
				$token = $_SESSION['token'];
				$count_sql = "SELECT * FROM orders WHERE token='$token'";
				$count_qry = mysqli_query($connect_rv2_orders, $count_sql);
				$rows = mysqli_num_rows($count_qry);
				echo '<p class="cart">CART: '.$rows.'</p>';
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
    <script src="js/shop_links.js"></script>

	</body>
</html>