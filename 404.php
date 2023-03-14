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
<main role="main" id="main-content" tabindex="-1">
  <h1>Page Not Found!</h1>
  <p>We're Sorry, this page doesn't exist on this website</p>
</main>
<?php include(SHARED_PATH . '/public_footer.php');