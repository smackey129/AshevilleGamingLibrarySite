<?php require_once('../private/initialize.php'); ?>
<?php 
$inventory = InventoryItem::find_all();
$page_title = 'Game Catalog'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}

?>

<h1>Game Catalog</h1>

<table border="1">
      <tr>
        <th>ID</th>
        <th>Game</th>
        <th>Console</th>
        <th>Condition</th>
        <th>Current User</th>
        <th>Donator</th>
        <th>Available?</th>
        <th>Available After</th>
      </tr>

      <?php foreach($inventory as $item) { ?>
        <tr>
          <td><?= h($item->id); ?></td>
          <td><?= h($item->getGame()); ?></td>
          <td><?= h($item->getConsole()); ?></td>
          <td><?= h($item->condition_inv); ?></td>
          <td><?= h($item->getCurrentUser()); ?></td>
          <td><?= h($item->getDonator()); ?></td>
          <td><?= h($item->getAvailability()); ?></td>
          <td><?= h($item->available_after_inv); ?></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php include(SHARED_PATH . '/user_footer.php'); ?>