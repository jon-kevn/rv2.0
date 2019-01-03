$sneakers = $('#sneakers');
$smoke_bombs = $('#smoke_bombs');
$photo_art = $('#photo_art');

$(document).ready(function(){
  $sneakers.click(function(){
    $(location).attr('href','../shop.php');
  });
});