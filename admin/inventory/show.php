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
?>

<?php $page_title = 'Item: ' . h($item->getGame()); ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>
<main role="main" id="main-content" tabindex="-1">

  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>

  <h1>Item: <?php echo h($item->getGame()); ?></h1>
  <dl>
    <dt>Console:</dt>
    <dd><?php echo h($item->getConsole()); ?></dd>
  </dl>

  <dl>
    <dt>Condition:</dt>
    <dd><?php echo h($item->condition_inv); ?></dd>
  </dl>

  <dl>
    <dt>Current User:</dt>
    <dd><?php echo h($item->getCurrentUser()); ?></dd>
  </dl>

  <dl>
    <dt>Donated By:</dt>
    <dd><?php echo h($item->getDonator()); ?></dd>
  </dl>

  <dl>
    <dt>Available?</dt>
    <dd><?php echo h($item->getAvailability()); ?></dd>
  </dl>

  <dl>
    <dt>Available After/Due By:</dt>
    <dd><time datetime=<?= $item->available_after_inv?>><?php echo h($item->available_after_inv); ?></time></dd>
  </dl>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
