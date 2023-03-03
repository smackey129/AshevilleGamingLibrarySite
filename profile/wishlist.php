<?php require_once('../private/initialize.php'); ?>
<?php 
$page_title = $session->username . '\'s Wish List'; 
include(SHARED_PATH . '/user_header.php'); 
$user = User::find_by_username($session->username);
$checkouts = $user->getCheckouts();
$games = $user->getWishList();
?>


<h2>My Wish List (Placeholder Content)</h2>

<table border="1">
      <tr>
        <th>Name</th>
        <th>ESRB Rating</th>
        <th>Minimum Age</th>
        <th>Genre</th>
        <th>Publisher</th>
      </tr>

      <?php foreach($games as $game) { ?>
        <tr>
          <td><?= h($game->name_gme); ?></td>
          <td><?= h($game->getRating()); ?></td>
          <td><?= h($game->getMinAge()); ?></td>
          <td><?= h($game->getGenre()); ?></td>
          <td><?= h($game->getPublisher()); ?></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php include(SHARED_PATH . '/user_footer.php');