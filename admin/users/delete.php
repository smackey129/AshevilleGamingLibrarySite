<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];
$user = User::find_by_id($id);
if($user == false) {
  redirect_to('index.php');
}

if(is_post_request()) {

  // Delete bicycle
  $result = $user->delete();
  $session->message('The user was deleted successfully.');
  redirect_to('index.php');

} else {
  // Display form
}

?>

<?php $page_title = 'Delete User'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<main>

  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>

  <div class="bicycle delete">
    <h1>Delete User</h1>
    <p>Are you sure you want to delete this user?</p>
    <p class="item"><?php echo h($user->username_usr); ?></p>

    <form action="<?php echo 'delete.php?id=' . h(u($id)); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete User" />
      </div>
    </form>
  </div>

</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
