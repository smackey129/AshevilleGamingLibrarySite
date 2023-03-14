<?php 
  require_once('../../private/initialize.php');   
  $games = Game::find_all();
  $page_title = 'Games'; 
  include(SHARED_PATH . '/admin_header.php'); 
?>
<main role="main" id="main-content" tabindex="-1">
  <a href='<?= url_for("/admin") ?>'>&laquo; Back to Admin Area</a><br>
  <h1>Games</h1>
  <a href='new.php'>Add New Game</a>
  <div class="table">
  	<table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>ESRB Rating</th>
        <th>Minimum Age</th>
        <th>Genre</th>
        <th>Publisher</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>

      <?php foreach($games as $game) { ?>
        <tr>
          <td><?= h($game->id); ?></td>
          <td><?= h($game->name_gme); ?></td>
          <td><?= h($game->getRating()); ?></td>
          <td><?= h($game->getMinAge()); ?></td>
          <td><?= h($game->getGenre()); ?></td>
          <td><?= h($game->getPublisher()); ?></td>
          <td><a href="<?php echo url_for('admin/games/show.php?id=' . h(u($game->id))); ?>">View</a></td>
          <td><a href="<?php echo url_for('admin/games/edit.php?id=' . h(u($game->id))); ?>">Edit</a></td>
          <td><a href="<?php echo url_for('admin/games/delete.php?id=' . h(u($game->id))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>