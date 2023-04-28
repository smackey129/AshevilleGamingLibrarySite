<?php 
  require_once('../../private/initialize.php');   
  $inventory = InventoryItem::find_all();
  $page_title = 'Inventory'; 
  include(SHARED_PATH . '/admin_header.php'); 
?>
<main role="main" id="main-content" tabindex="-1">
  <a href='<?= url_for("/admin") ?>'>&laquo; Back to Admin Area</a><br>
  <h1>Inventory</h1>
  <a href="new.php" class="button">Add Inventory Item</a>
  <div class="table">
  	<table>
      <tr>
        <th>ID</th>
        <th>Game</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>

      <?php foreach($inventory as $item) { ?>
        <tr>
          <td><?= h($item->id); ?></td>
          <td><?= h($item->getGame()); ?></td>
          <td><a href="<?php echo url_for('admin/inventory/show.php?id=' . h(u($item->id))); ?>">View</a></td>
          <td><a href="<?php echo url_for('admin/inventory/edit.php?id=' . h(u($item->id))); ?>">Edit</a></td>
          <td><a href="<?php echo url_for('admin/inventory/delete.php?id=' . h(u($item->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>