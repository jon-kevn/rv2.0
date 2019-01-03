<?php
session_start();
require_once '../includes/rv2.php';
require_once '../includes/rv2_products.php';
require_once '../includes/rv2_articles.php';

// IMAGE UPLOAD PROCESS
if(isset($_POST['upload_image'])){
	$i = 0;
	while($i < count($_FILES['file']['name'])){
		$file = $_FILES['file'];
		$file_name = $_FILES['file']['name'][$i];
		$file_tmp_name = $_FILES['file']['tmp_name'][$i];
		$file_dest = '../../assets/image_gallery/';
		move_uploaded_file($file_tmp_name, $file_dest.$file_name);
		$sql = "INSERT INTO images (filename) VALUES ('$file_name')";
		$qry = mysqli_query($connect, $sql);
		$i++;
	}
	$_SESSION['img_upload_success'] = 'Image(s) uploaded successfully.';
	header('Location: ../pages/admin.php#image_actions');
}

// IMAGE DELETE PROCESS
else if(isset($_POST['delete_image'])){
	$file_name = $_POST["filename"];
	$sql = "DELETE FROM images WHERE filename = '$file_name'";
	$qry = mysqli_query($connect, $sql);
	$_SESSION['img_delete_success'] = 'Image deleted successfully';
	header('Location: ../pages/admin.php#image_actions');
}

// VIDEO UPLOAD PROCESS
else if(isset($_POST['upload_video'])){
	$file = $_FILES["file"];
	$file_name = $_FILES['file']['name'];
	$file_tmp_name = $_FILES['file']['tmp_name'];
	$file_dest = '../../assets/video_gallery/';
	$video_title = $_POST['video_title'];
	$video_date = $_POST['video_date'];
	move_uploaded_file($file_tmp_name, $file_dest.$file_name);
	$sql = "INSERT INTO videos (filename, title, up_date) VALUES ('$file_name', '$video_title','$video_date')";
	$qry = mysqli_query($connect, $sql);
	$_SESSION['video_upload_success'] = 'Video uploaded successfully';
	header('Location: ../pages/admin.php#video_actions');
}

// VIDEO DELETE PROCESS
else if(isset($_POST['delete_video'])){
	$file_name = $_POST["filename"];
	$sql = "DELETE FROM videos WHERE filename = '$file_name'";
	$qry = mysqli_query($connect, $sql);
	$_SESSION['video_delete_success'] = 'Video deleted successfully';
	header('Location: ../pages/admin.php#video_actions');
}

// AUDIO UPLOAD PROCESS
else if(isset($_POST['upload_audio'])){
	$audio_file = $_FILES["audio_file"];
	$audio_file_name = $_FILES['audio_file']['name'];
	$audio_file_tmp_name = $_FILES['audio_file']['tmp_name'];
	$audio_file_dest = '../../assets/audio_gallery/audio_files/';

	$image_file = $_FILES["img_file"];
	$image_file_name = $_FILES['img_file']['name'];
	$image_file_tmp_name = $_FILES['img_file']['tmp_name'];
	$image_file_dest = '../../assets/audio_gallery/posters/';

	$audio_title = $_POST['audio_title'];
	$audio_date = $_POST['audio_date'];

	move_uploaded_file($audio_file_tmp_name, $audio_file_dest.$audio_file_name);
	move_uploaded_file($image_file_tmp_name, $image_file_dest.$image_file_name);

	$sql = "INSERT INTO audio (filename, title, up_date, poster) VALUES ('$audio_file_name', '$audio_title', '$audio_date', '$image_file_name')";
	$qry = mysqli_query($connect, $sql);

	$_SESSION['audio_upload_success'] = 'Audio uploaded successfully';

	header('Location: ../pages/admin.php#audio_actions');
}

// AUDIO DELETE PROCESS
else if(isset($_POST['delete_audio'])){
	$file_name = $_POST["filename"];
	$sql = "DELETE FROM audio WHERE filename = '$file_name'";
	$qry = mysqli_query($connect, $sql);
	$_SESSION['audio_delete_success'] = 'Audio deleted successfully';
	header('Location: ../pages/admin.php#audio_actions');
}

// ADD PRODUCT PROCESS
else if(isset($_POST['add_product'])){
	$file = $_FILES["file"];
	$file_name = $_FILES['file']['name'];
	$file_tmp_name = $_FILES['file']['tmp_name'];
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_category = $_POST['product_category'];

	if($product_category == 'shoes'){
		$file_dest = '../../assets/shop/shoes';
		move_uploaded_file($file_tmp_name, $file_dest.$file_name);
		$sql = "INSERT INTO shoes (image, name, price) VALUES ('$file_name', '$product_name','$product_price')";
		$qry = mysqli_query($connect_rv2_products, $sql);
		$_SESSION['product_addition_success'] = 'Product added successfully';
		header('Location: ../pages/admin.php#product_actions');
	}

	elseif ($product_category == 'smoke_bombs') {
		$file_dest = '../../assets/shop/smoke_bombs';
		move_uploaded_file($file_tmp_name, $file_dest.$file_name);
		$sql = "INSERT INTO smoke_bombs (image, name, price) VALUES ('$file_name', '$product_name','$product_price')";
		$qry = mysqli_query($connect_rv2_products, $sql);
		$_SESSION['product_addition_success'] = 'Product added successfully';
		header('Location: ../pages/admin.php#product_actions');
	}

	elseif ($product_category == 'artwork') {
		$file_dest = '../../assets/shop/artwork';
		move_uploaded_file($file_tmp_name, $file_dest.$file_name);
		$sql = "INSERT INTO artwork (image, name, price) VALUES ('$file_name', '$product_name','$product_price')";
		$qry = mysqli_query($connect_rv2_products, $sql);
		$_SESSION['product_addition_success'] = 'Product added successfully';
		header('Location: ../pages/admin.php#product_actions');
	}
}

// REMOVE PRODUCT PROCESS
else if(isset($_POST['remove_product'])){
	$product_category = $_POST['product_category'];
	$product_name = $_POST['product_name'];
	$sql = "DELETE FROM $product_category WHERE name = '$product_name'";
	$qry = mysqli_query($connect_rv2_products, $sql);
	$_SESSION['product_removal_success'] = 'Product removed successfully';
	header('Location: ../pages/admin.php#product_actions');
}

// ARTICLE ADDITION PROCESS
else if(isset($_POST['add_article'])){
	$cat = $_POST['cat'];
	$author = mysqli_real_escape_string($connect_rv2_articles, $_POST['author']);

	$author_pic = $_FILES["author_pic"];
	$author_pic_name = $_FILES['author_pic']['name'];
	$author_pic_tmp_name = $_FILES['author_pic']['tmp_name'];

	$hero_image = $_FILES["hero_image"];
	$hero_image_name = $_FILES['hero_image']['name'];
	$hero_image_tmp_name = $_FILES['hero_image']['tmp_name'];

	$title = mysqli_real_escape_string($connect_rv2_articles, $_POST['title']);
	$sub_title = mysqli_real_escape_string($connect_rv2_articles, $_POST['sub_title']);
	$post_date = mysqli_real_escape_string($connect_rv2_articles, $_POST['post_date']);
	$length = mysqli_real_escape_string($connect_rv2_articles, $_POST['length']);
	$atcl_text = mysqli_real_escape_string($connect_rv2_articles, $_POST['atcl_text']);

	switch ($cat) {
		case 'feature_articles':
			$dest = '../../assets/images/';
			move_uploaded_file($author_pic_tmp_name, $dest.$author_pic_name);
			move_uploaded_file($hero_image_tmp_name, $dest.$hero_image_name);
			$sql = "INSERT INTO feature_articles (author, author_pic, hero_image, title, sub_title, post_date, length, atcl_text) VALUES ('$author', '$author_pic_name', '$hero_image_name', '$title', '$sub_title', '$post_date', '$length', '$atcl_text')";
			$qry = mysqli_query($connect_rv2_articles, $sql);
			$_SESSION['article_addition_success'] = 'Article added successfully.';
			header('Location: ../pages/admin.php#article_actions');
			break;
			
		case 'general_news':
			$dest = '../../assets/images/';
			move_uploaded_file($author_pic_tmp_name, $dest.$author_pic_name);
			move_uploaded_file($hero_image_tmp_name, $dest.$hero_image_name);
			$sql = "INSERT INTO general_news (author, author_pic, hero_image, title, sub_title, post_date, length, atcl_text) VALUES ('$author', '$author_pic_name', '$hero_image_name', '$title', '$sub_title', '$post_date', '$length', '$atcl_text')";
			$qry = mysqli_query($connect_rv2_articles, $sql);
			$_SESSION['article_addition_success'] = 'Article added successfully.';
			header('Location: ../pages/admin.php#article_actions');
			break;

		case 'environmental_awareness':
			$dest = '../../assets/images/';
			move_uploaded_file($author_pic_tmp_name, $dest.$author_pic_name);
			move_uploaded_file($hero_image_tmp_name, $dest.$hero_image_name);
			$sql = "INSERT INTO environmental_awareness (author, author_pic, hero_image, title, sub_title, post_date, length, atcl_text) VALUES ('$author', '$author_pic_name', '$hero_image_name', '$title', '$sub_title', '$post_date', '$length', '$atcl_text')";
			$qry = mysqli_query($connect_rv2_articles, $sql);
			$_SESSION['article_addition_success'] = 'Article added successfully.';
			header('Location: ../pages/admin.php#article_actions');
			break;

		default:
			break;
	}
}

?>