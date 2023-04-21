<?php require_once('../private/initialize.php'); ?>

<?php 
$current_page = 4;
$users = User::find_all(); 
$inventory = InventoryItem::find_all();
$games = Game::find_all();
$page_title = 'Database Contents'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}

?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Donate A Game</h1>
  <?php
    if($session->is_logged_in()) { ?>
      <a class='button' href='donate.php'>Donate a Game</a>
    <?php }
    else { ?>
      <a class='button' href='<?= url_for("signup.php")?>'>Sign Up to Donate a Game</a>
    <?php }
  ?>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>