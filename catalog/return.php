<?php require_once('../private/initialize.php');   ?>

<?php
$current_page = 3;
if(!isset($_GET['id']) || !is_post_request() || !($session->is_logged_in())) {
  redirect_to('index.php');
}

$id = $_GET['id'];
$item = InventoryItem::find_by_id($id);
$user = User::find_by_username($session->username);
if($item->available_inv) {
  redirect_to('index.php');
}

$game = Game::find_by_id($item->id_gme_inv);

if($game == false) {
  redirect_to('index.php');
}
?>

<?php $page_title = 'Return: ' . h($game->name_gme); ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Thank You!</h1>
  <?php if($item->return($user)) { ?>
    <p>Thank you for returning this game! Be sure to send it to us or drop it off at *insert address here*</p>
  <?php } 
    else  {?>
      <p>We're sorry, you are not able to return this item as you have not checked it out</p>
  <?php }?>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
