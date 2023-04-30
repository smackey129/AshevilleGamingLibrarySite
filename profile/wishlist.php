<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Wish List'; 
include(SHARED_PATH . '/user_header.php'); 
$user = User::find_by_username($session->username);
$wishlist = $user->getWishList();
?>

<?php 
  $removed = false;
  if(is_post_request()){
    foreach($wishlist as $item){
      if(isset($_POST[$item->id])){
        $user->removeFromWishList($item);
        $removed = $item->id;
      }
    }
  }
  $wishlist = $user->getWishList();
?>

<main>
  <h1>My Wish List</h1>
  <?php
    if($removed) {
      echo "<p>Item successfully removed from wishlist</p>";
    }
  ?>
  <div class="table">
    <table>
      <tr>
        <th>Game</th>
        <th>Available?</th>
        <th>Available After</th>
      </tr>

      <?php foreach($wishlist as $item) { ?>
        <tr>
          <td><a href="<?= url_for('catalog/view.php?id=' . h(u($item->id)));?>"> <?= h($item->getGame()); ?></td>
          <td><?= h($item->getAvailability()); ?></td>
          <td><?= h($item->available_after_inv); ?></td>
          <td>
            <form action="wishlist.php" method="POST">
              <input type="submit" value="Remove" name="<?= $item->id ;?>">
            </form>
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php');