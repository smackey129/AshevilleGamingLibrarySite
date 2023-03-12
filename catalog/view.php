<?php require_once('../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];
$item = InventoryItem::find_by_id($id);
$game = Game::find_by_id($item->id_gme_inv);

if($game == false) {
  redirect_to('index.php');
}
?>

<?php $page_title = 'Game: ' . h($game->name_gme); ?>
<?php 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
} 
?>
<main>

    <a class="back-link" href="<?php echo url_for('catalog/index.php'); ?>">&laquo; Back to Catalog</a>

    <h1>Game Name: <?php echo h($game->name_gme); ?></h1>
    <dl>
      <dt>Console:</dt>
      <dd><?php echo h($item->getConsole()); ?></dd>
    </dl>

    <dl>
      <dt>ESRB Rating:</dt>
      <dd><?php echo h($game->getRating()); ?></dd>
    </dl>

    <dl>
      <dt>Genre:</dt>
      <dd><?php echo h($game->getGenre()); ?></dd>
    </dl>

    <dl>
      <dt>Publisher:</dt>
      <dd><?php echo h($game->getPublisher()); ?></dd>
    </dl>

    <?php 
    if(isset($session->user_level) && $item->available_inv){ ?>
      <form action="checkout.php?id=<?= h(u($item->id));?>" method="POST">
        <input type="submit" name="checkout" value="Check Out Game">
      </form>
    <?php }
    ?>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>