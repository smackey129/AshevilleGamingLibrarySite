<?php
require_once('../private/initialize.php');
$current_page = 4;
if(is_post_request()) {
  $item = new InventoryItem;
  $args = $_POST['item'];
  if($args['id_gme_inv'] == -1) {
    $game_args = $_POST['game'];
    $new_game = new Game($game_args);
    $game_result = $new_game->save();
    if($game_result === true) {
      $new_id = $new_game->id;
      $args['id_gme_inv'] = $new_id;
    } 
  }
  else {
    $game_result = true;
  }
  if($game_result === true) {
    $item = new InventoryItem($args);
    $user = User::find_by_username($session->username);
    $item->id_usrdonator_inv = $user->id;
    $item->available_inv = 0;
    $item->available_after_inv = date("Y-m-d");
    $result = $item->save();
    if($result === true) {
      $new_id = $item->id;
      $session->message('Thank you for your donation! Either come in and drop off your game in person or mail it to us at our location at *insert address here*');
      redirect_to(url_for('catalog/view.php?id=' . $item->id));
    } else {
      // show errors
    }
  }
  

} else {
  // display the form
  $item = new InventoryItem;
  $new_game = new Game;
}

?>

<?php $page_title = 'Donate Item'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>
<main role="main" id="main-content" tabindex="-1">
    <h1>Donate A Game</h1>
    <p>Fields marked with "*" are required</p>
    <?php echo display_errors(array_merge($item->errors, $new_game->errors)); ?>

    <form action="<?php echo 'donate.php'; ?>" method="post">

      <?php include('form_fields_inventory.php'); ?>

        <input type="submit" value="Create Item">
    </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
