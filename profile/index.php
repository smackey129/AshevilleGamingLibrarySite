<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Profile'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}

?>

<h1><?= $session->username ."'s Profile Page"?></h1>

<a href="mydonations.php">My Donated Games</a>
<a href="mycheckouts.php">My Checked Out Games</a>

<?php include(SHARED_PATH . '/user_footer.php');