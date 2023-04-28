<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Profile'; 
include(SHARED_PATH . '/user_header.php'); 
$user = User::find_by_username($session->username);
$checkouts = $user->getCheckouts();

?>

<main>
  <h1>My Checked Out Games</h1>
  <div class="table">
  	<table>
      <tr>
        <th>Game</th>
        <th>Console</th>
        <th>Due By</th>
      </tr>

      <?php foreach($checkouts as $item) { ?>
        <tr>
          <td><?= h($item->getGame()); ?></td>
          <td><?= h($item->getConsole()); ?></td>
          <td><?= h($item->available_after_inv); ?></td>
          <td>
            <form method="POST" action="<?=url_for('catalog/return.php?id=' . h(u($item->id))) ?>">
              <input type="submit" value="Return Game" class="return-game">
            </form>
          </td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php');