<?php require_once('../private/initialize.php'); ?>
<?php 
$inventory = InventoryItem::find_all();
$page_title = 'Admin Area'; 
include(SHARED_PATH . '/admin_header.php'); 


?>

<h1>Admin Area</h1>
<a href="users">User List</a>
<a href="games">Game List</a>
<a href="inventory">Inventory List</a>

<?php include(SHARED_PATH . '/user_footer.php'); ?>