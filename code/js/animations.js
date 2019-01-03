// SIDENAV MECHANIC
$menu_btn = $('#menu_box p');
$sidenav = $('.sidenav');
$close_btn = $('.sidenav .close');

// LIGHT-BOX MECHANIC
$image = $('#gallery img');
$light_box = $('#light_box');
$light_box_img = $('#light_box img');

// VIDEO PLAYER MECHANIC
$play_btn = $('#gallery .grid-x .cell .play');
$video = $('#vid_player .vid_cont video');
$video_player = $('#vid_player');
$close_player = $('#vid_player .close');
$vid_cont = $('#vid_player .vid_cont');

// SCROLL HINT MECHANIC
$mouse_control = $('#banner .middle');

// FORM MSG MECHANIC
$form_message = $('#actions .cell .form_message');

// SHOP CATEGORY TOGGLE
$category_btns = $('.categories p');
$shoes_btn = $('.shoes_btn');
$smoke_bombs_btn = $('.smoke_bombs_btn');
$artwork_btn = $('.artwork_btn');
$current_category = $('#display .cat_cont');
$shoes = $('#shoes');
$smoke_bombs = $('#smoke_bombs');
$artwork = $('#artwork');

// CART MECHANIC
$cart_btn = $('.categories .cart');
$cart = $('#cart');
$cart_close = $('#cart .close');

// CHECKOUT MECHANIC
// $checkout_btn = $('#cart .checkout_btn');
// $order_submission = $('#order_submission');
// $order_submission_close = $('#order_submission .close');

// BLOG SLIDER
$slide_one = $('.slide_control #one');
$slide_two = $('.slide_control #two');
$slide_three = $('.slide_control #three');

$article_one = $('.articles .one');
$article_two = $('.articles .two');
$article_three = $('.articles .three');

$articles = $('.articles .article');
$controls = $('.slide_control p');

$(document).ready(function(){

	// SHOW SIDENAV
	$menu_btn.click(function(){
		$sidenav.show(100);
	});
	// HIDE SIDENAV
	$close_btn.click(function(){
		$sidenav.hide(100);
	});

	// SHOW LIGHT-BOX
	$image.each(function(){
		$(this).click(function(){
			$src = $(this).attr('src');
			$light_box_img.attr('src', $src);
			$light_box.show(100);
		});
	});
	// HIDE LIGHT-BOX
	$light_box.click(function(){
		$light_box.hide(100);
	});

	// ENTER VIDEO PLAYER
	$play_btn.each(function(){
		$(this).click(function(){
			$src = $(this).attr('data-vid');
			$vid_cont.html('<video controls><source src="'+ $src +'" type="video/mp4"></video>');
			$video_player.show(100);
			$('#vid_player .vid_cont video')[0].play();
		});
	});
	// EXIT VIDEO PLAYER
	$close_player.click(function(){
		$('#vid_player .vid_cont video')[0].pause();
		$video.children().remove();
		$video_player.hide(100);
	});

	// SCROLL HINT MECHANIC
	$(window).scroll(function(){
		if($(this).scrollTop() == 0){
			$mouse_control.show(200);
		}
		else if($(this).scrollTop() > 0){
			$mouse_control.hide(200);
		}
	});

	// FORM MSG MECHANIC
	$timeout = 	setTimeout(function(){
					$form_message.fadeOut(420);
					clearTimeout($timeout);
				}, 5000);

	// SHOP CATEGORY TOGGLE MECHANIC
	$shoes_btn.click(function(){
		$current_category.hide();
		$shoes.css('display', 'flex');
		$category_btns.removeClass('active');
		$shoes_btn.addClass('active');
	});
	$smoke_bombs_btn.click(function(){
		$current_category.hide();
		$smoke_bombs.css('display', 'flex');
		$category_btns.removeClass('active');
		$smoke_bombs_btn.addClass('active');
	});
	$artwork_btn.click(function(){
		$current_category.hide();
		$artwork.css('display', 'flex');
		$category_btns.removeClass('active');
		$artwork_btn.addClass('active');
	});

	// CART MECHANIC
	$cart_btn.each(function(){
		$(this).click(function(){
			$cart.show(100);
		});
	});

	$cart_close.click(function(){
		$cart.hide(100);
	});

	// CHECKOUT MECHANIC
	// $checkout_btn.click(function(){
	// 	$order_submission.show(100);
	// });
	// $order_submission_close.click(function(){
	// 	$order_submission.hide(100);
	// });

	// BLOG SLIDER
	$slide_one.click(function(){
		$article_one.animate({left: "0"}, 100);
		$controls.removeClass('active');
		$slide_one.addClass('active');
	});

	$slide_two.click(function(){
		$article_one.animate({left: "-100vw"}, 100);
		$article_two.animate({left: "0"}, 100);
		$controls.removeClass('active');
		$slide_two.addClass('active');
	});

	$slide_three.click(function(){
		$article_one.animate({left: "-100vw"}, 100);
		$article_two.animate({left: "-100vw"}, 100);
		$article_three.animate({left: "0"}, 100);
		$controls.removeClass('active');
		$slide_three.addClass('active');
	});

});