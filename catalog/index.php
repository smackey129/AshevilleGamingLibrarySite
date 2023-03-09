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
<main>
  <h1>Game Catalog</h1>

  <table border="1">
    <tr>
      <th>Game</th>
      <th>Console</th>
      <th>Condition</th>
      <th>Available?</th>
    </tr>

    <?php foreach($inventory as $item) { ?>
      <tr>
        <td><a href="<?= 'view.php?id=' . h(u($item->id));?>"> <?= ($item->getGame()); ?></td>
        <td><?= h($item->getConsole()); ?></td>
        <td><?= h($item->condition_inv); ?></td>
        <td><?= h($item->getAvailability()); ?></td>
      </tr>
    <?php } ?>
  </table>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>