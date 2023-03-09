<?php
require_once('../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['item'];
  $item = new InventoryItem($args);
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

<?php $page_title = 'Create Inventory Item'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>
<main>
    <h1>Create Inventory Item</h1>

    <?php echo display_errors($item->errors); ?>

    <form action="<?php echo 'new.php'; ?>" method="post">

      <?php include('form_fields.php'); ?>

        <input type="submit" value="Create Item" />
    </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
