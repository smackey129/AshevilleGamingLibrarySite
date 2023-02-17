<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Profile'; 
include(SHARED_PATH . '/user_header.php'); 

?>

<h1><?= $session->username ."'s Profile Page"?></h1>

<a href="mydonations.php">My Donated Games</a>
<a href="mycheckouts.php">My Checked Out Games</a>

<?php include(SHARED_PATH . '/user_footer.php');