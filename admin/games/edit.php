<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$id = $_GET['id'];
$game = Game::find_by_id($id);
if($game == false) {
  redirect_to('index.php');
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['game'];
  $game->merge_attributes($args);
  $result = $game->save();
  if($result === true) {
    $session->message('The game was updated successfully.');
    redirect_to('show.php?id=' . $id);
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit Game'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<main>

  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>

  <div class="bicycle edit">
    <h1>Edit Game</h1>

    <?php echo display_errors($game->errors); ?>

    <form action="<?php echo 'edit.php?id=' . h(u($id)); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Game" />
      </div>
    </form>

  </div>

</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>