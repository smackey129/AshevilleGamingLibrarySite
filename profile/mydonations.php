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
        <th>ID</th>
        <th>Game</th>
        <th>Console</th>
        <th>Condition</th>
        <th>Current User</th>
        <th>Available?</th>
        <th>Available After</th>
      </tr>

      <?php foreach($donations as $item) { ?>
        <tr>
          <td><?= h($item->id); ?></td>
          <td><?= h($item->getGame()); ?></td>
          <td><?= h($item->getConsole()); ?></td>
          <td><?= h($item->condition_inv); ?></td>
          <td><?= h($item->getCurrentUser()); ?></td>
          <td><?= h($item->getAvailability()); ?></td>
          <td><?= h($item->available_after_inv); ?></td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php');