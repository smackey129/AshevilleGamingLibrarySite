<?php require_once('private/initialize.php'); ?>

<?php 
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
<main>
  <h1>Welcome to the Asheville Game Library</h1>
  
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>