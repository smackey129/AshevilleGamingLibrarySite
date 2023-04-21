<?php require_once('../private/initialize.php');   ?>

<?php
$current_page = 3;

if(isset($_POST['login'])) {
  redirect_to(url_for('login.php'));
}

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];
$item = InventoryItem::find_by_id($id);
$game = Game::find_by_id($item->id_gme_inv);
$user = User::find_by_username($session->username);



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
<main role="main" id="main-content" tabindex="-1">

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

      <form action="checkout.php?id=<?= h(u($item->id));?>" method="POST">
        <?php 
          if(isset($session->user_level) && $item->available_inv){ ?>
          <input type="submit" name="checkout" value="Check Out Game">
        <?php }
          elseif(!$item->available_inv){ ?>
          <input type="submit" name="checkout" value="This game is currently unavailable" disabled>
        <?php }
        else{ ?>
          <input type="submit" name="login" value="Sign in to check out a game">
        <?php }?>
      </form>
      <?php if(isset($session->user_level) && $item->id_usr_inv == $user->id) { ?>
        <form action="return.php?id=<?= h(u($item->id));?>" method="POST">
          <input type="submit" value="Return Game">
      </form>
      <?php } ?>

      <?php 
        if(is_post_request()){
          if(isset($_POST['wishlist'])){
            if($user->addToWishList($item)){
              echo "<span>Added to your Wish List!</span><br>";
            }
          }
          elseif(isset($_POST['remove'])) {
            if($user->removeFromWishList($item)){
              echo "<span>Removed From your Wish List!</span><br>";
            }
          }
      }?>

      <form action="view.php?id=<?= h(u($item->id));?>" method="POST">
        <?php 
          if(isset($session->user_level)){ 
            if(!$item->isWishlisted($user)) {?>
          <input type="submit" name="wishlist" value="Add to Wish List">
        <?php }
          elseif($item->isWishlisted($user)){ ?>
          <input type="submit" name="remove" value="Remove from Wish List">
        <?php }}
        else{ ?>
          <input type="submit" name="login" value="Sign in to add to your wish list">
        <?php }?>
      </form>
      
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>