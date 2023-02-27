<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Profile'; 
include(SHARED_PATH . '/user_header.php'); 
$user = User::find_by_username($session->username);
$checkouts = $user->getCheckouts();

?>


<h2>My Wish List (Placeholder Content)</h2>

  	<table border="1">
      <tr>
        <th>Game</th>
        <th>Console</th>
        <th>Condition</th>
        <th>Due By</th>
      </tr>

      <?php foreach($checkouts as $item) { ?>
        <tr>
          <td><?= h($item->getGame()); ?></td>
          <td><?= h($item->getConsole()); ?></td>
          <td><?= h($item->condition_inv); ?></td>
          <td><?= h($item->available_after_inv); ?></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php include(SHARED_PATH . '/user_footer.php');