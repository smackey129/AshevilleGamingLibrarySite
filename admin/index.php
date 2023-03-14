<?php require_once('../private/initialize.php'); ?>
<?php 
$inventory = InventoryItem::find_all();
$page_title = 'Admin Area'; 
include(SHARED_PATH . '/admin_header.php'); 


?>
<main>
  <h1>Admin Area</h1>
  <ul id="link_options">
    <li><a href="users">User List</a></li>
    <li><a href="games">Game List</a></li>
    <li><a href="inventory">Inventory List</a></li>
  </ul>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>