<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Profile'; 
include(SHARED_PATH . '/user_header.php'); 
$user = User::find_by_username($session->username);
$donations = $user->getDonations();

?>

<main>
  <h1>My Donations</h1>
  <div class="table">
  	<table>
      <tr>
        <th>Game</th>
        <th>Console</th>
      </tr>

      <?php foreach($donations as $item) { ?>
        <tr>
          <td><a href="<?= url_for('catalog/view.php?id=' . h(u($item->id)));?>"> <?= h($item->getGame()); ?></td>
          <td><?= h($item->getConsole()); ?></td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php');