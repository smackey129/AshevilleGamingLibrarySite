<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];

$game = Game::find_by_id($id);

if($game == false) {
  redirect_to('index.php');
}
?>

<?php $page_title = 'Game: ' . h($game->name_gme); ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>
<main>
  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>

  <h1>Game Name: <?php echo h($game->name_gme); ?></h1>
  <dl>
    <dt>ESRB Rating:</dt>
    <dd><?php echo h($game->getRating()); ?></dd>
  </dl>

  <dl>
    <dt>Genre:</dt>
    <dd><?php echo h($game->getGenre()); ?></dd>
  </dl>

  <dl>
    <dt>Publisher</dt>
    <dd><?php echo h($game->getPublisher()); ?></dd>
  </dl>
  
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>