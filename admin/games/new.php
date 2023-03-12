<?php
require_once('../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['game'];
  $game = new Game($args);
  $result = $game->save();

  if($result === true) {
    $new_id = $game->id;
    $session->message('The item was created successfully.');
    redirect_to('index.php');
  } else {
    // show errors
  }

} else {
  // display the form
  $game = new Game;
}

?>

<?php $page_title = 'Create New Game'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>
<main>
  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>

    <h1>Create New Game</h1>

    <?php echo display_errors($game->errors); ?>

    <form action="<?php echo 'new.php'; ?>" method="post">

      <?php include('form_fields.php'); ?>

        <input type="submit" value="Create Game" />
    </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
