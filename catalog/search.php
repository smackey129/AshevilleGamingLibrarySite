<?php require_once('../private/initialize.php');   ?>

<?php $page_title = 'Search Page'; ?>
<?php
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
} 
?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Search Page Stub</h1>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>