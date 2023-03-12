<?php
require_once('../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['item'];
  $item = new InventoryItem($args);
  $user = User::find_by_username($session->username);
  $item->id_usrdonator_inv = $user->id;
  $item->available_inv = 0;
  $item->available_after_inv = date("Y-m-d");
  $result = $item->save();

  if($result === true) {
    $new_id = $item->id;
    $session->message('The item was created successfully.');
    redirect_to('index.php');
  } else {
    // show errors
  }

} else {
  // display the form
  $item = new InventoryItem;
}

?>

<?php $page_title = 'Donate Item'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>
<main>
    <h1>Donate A Game</h1>

    <?php echo display_errors($item->errors); ?>

    <form action="<?php echo 'donate.php'; ?>" method="post">

      <?php include('form_fields_inventory.php'); ?>

        <input type="submit" value="Create Item">
    </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
