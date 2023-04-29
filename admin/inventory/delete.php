<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];
$item = InventoryItem::find_by_id($id);
if($item == false) {
  redirect_to('index.php');
}

if(is_post_request()) {

  // Delete bicycle
  $result = $item->delete();
  $session->message('The item was deleted successfully.');
  redirect_to('index.php');

} else {
  // Display form
}

?>

<?php $page_title = 'Delete Item'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<main role="main" id="main-content" tabindex="-1">
  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>
  <h1>Delete Item</h1>
  <p>Are you sure you want to delete this item?</p>
  <p class="item"><?php echo h($item->getGame()); ?></p>
  <form action="<?php echo 'delete.php?id=' . h(u($id)); ?>" method="post">
    <input type="submit" name="commit" value="Delete Item">
  </form>

</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
