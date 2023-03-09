<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Profile'; 
include(SHARED_PATH . '/user_header.php'); 

?>
<main>
  <h1><?= $session->username ."'s Profile Page"?></h1>
  <ul>
    <li><a href="editinfo.php">Edit My Information</a></li>
    <li><a href="mydonations.php">My Donated Games</a></li>
    <li><a href="mycheckouts.php">My Checked Out Games</a></li>
    <li><a href="wishlist.php">My Wishlist</a></li>
  </ul>
</main>
<?php include(SHARED_PATH . '/user_footer.php');