<?php require_once('../private/initialize.php');   ?>
<?php $page_title = 'Thank You!'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>
<?php 
  if(isset($_SERVER['HTTP_REFERER']) && (mb_strpos($_SERVER['HTTP_REFERER'], 'donate.php')!==false)) { ?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Thank You!</h1>
  <p>Thank you for your donation! Either come in and drop off your game in person or mail it to us at our location at *insert address here*</p>

</main>
<?php } 
  else {
    redirect_to(url_for('index.php'));
}?>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
