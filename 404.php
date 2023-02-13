<?php require_once('private/initialize.php'); ?>

<?php 
$page_title = 'Page Not Found'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}
?>

<h2>Page Not Found!</h2>

<?php include(SHARED_PATH . '/public_footer.php');