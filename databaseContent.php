<?php require_once('private/initialize.php'); ?>

<?php 
$users = User::find_all(); 
$inventory = InventoryItem::find_all();
$games = Game::find_all();
$page_title = 'Database Contents'; 
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
}

?>

<h1>Database Table Examples</h1>
<h2>Users</h2>

  	<table border="1">
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>User Level</th>
        <th>Balance</th>
      </tr>

      <?php foreach($users as $user) { ?>
        <tr>
          <td><?= h($user->id); ?></td>
          <td><?= h($user->fname_usr); ?></td>
          <td><?= h($user->lname_usr); ?></td>
          <td><?= h($user->email_usr); ?></td>
          <td><?= h($user->username_usr); ?></td>
          <td><?= h($user->street_address_usr); ?></td>
          <td><?= h($user->city_usr); ?></td>
          <td><?= h($user->getStateAbbr()); ?></td>
          <td><?= h($user->user_level_usr); ?></td>
          <td><?= h($user->balance_usr); ?></td>
    	  </tr>
      <?php } ?>
  	</table>

    <h2>Inventory</h2>

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

    <h2>Games</h2>

  	<table border="1">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>ESRB Rating</th>
        <th>Minimum Age</th>
        <th>Genre</th>
        <th>Publisher</th>
      </tr>

      <?php foreach($games as $game) { ?>
        <tr>
          <td><?= h($game->id); ?></td>
          <td><?= h($game->name_gme); ?></td>
          <td><?= h($game->getRating()); ?></td>
          <td><?= h($game->getMinAge()); ?></td>
          <td><?= h($game->getGenre()); ?></td>
          <td><?= h($game->getPublisher()); ?></td>
    	  </tr>
      <?php } ?>
  	</table>
<?php include(SHARED_PATH . '/user_footer.php'); ?>