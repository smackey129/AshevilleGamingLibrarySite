<?php require_once('private/initialize.php'); ?>
<?php 
$current_page = 2;
$page_title = 'About Asheville Game Library'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}

?>
<main role="main" id="main-content" tabindex="-1">
  <h1>About Us</h1>
  <p>Asheville Game Library is a fictional website created for a WEB289 Project at Asheville-Buncombe Technical Community College<p>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
