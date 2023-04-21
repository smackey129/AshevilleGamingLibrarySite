<?php require_once('private/initialize.php'); ?>

<?php 
$current_page = 1;
$page_title = 'Home'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}

?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Welcome to the Asheville Game Library</h1>
  <p>The Asheville Game Library is a site where you can search for and check out a variety of games donated by our users.</p>

  <h2>Checking out and Returning Games</h2>
  <p>Users can search the catalog and reserve a game if it is available. Users can check out a game for one week at a time. Once a user has reserved a game they can pick it up at our central location (this is a fictitious organization and it does not actually exist). When the week has passed users must return the game at the central location.</p>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>