<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Wish List'; 
include(SHARED_PATH . '/user_header.php'); 
$user = User::find_by_username($session->username);
$wishlist = $user->getWishList();
?>

<main>
  <h1>My Wish List</h1>
  <div class="table">
    <table>
      <tr>
        <th>Game</th>
        <th>Console</th>
        <th>Condition</th>
        <th>Available?</th>
        <th>Available After</th>
      </tr>

      <?php foreach($wishlist as $item) { ?>
        <tr>
          <td><a href="<?= url_for('catalog/view.php?id=' . h(u($item->id)));?>"> <?= ($item->getGame()); ?></td>
          <td><?= h($item->getConsole()); ?></td>
          <td><?= h($item->condition_inv); ?></td>
          <td><?= h($item->getAvailability()); ?></td>
          <td><?= h($item->available_after_inv); ?></td>
        </tr>
      <?php } ?>
    </table>
  </div>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php');