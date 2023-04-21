<?php require_once('../private/initialize.php');   ?>
<?php $page_title = 'Information Updated'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>
<?php 
  if(isset($_SERVER['HTTP_REFERER']) && (mb_strpos($_SERVER['HTTP_REFERER'], 'editinfo.php')!==false)) { ?>
<main role="main" id="main-content" tabindex="-1">
  <h1>User Information Updated!</h1>

</main>
<?php } 
  else {
    redirect_to(url_for('index.php'));
}?>

<?php include(SHARED_PATH . '/user_footer.php'); ?>