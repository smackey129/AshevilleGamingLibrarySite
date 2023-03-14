<?php
require_once('../../private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['user'];
  $user = new User($args);
  $result = $user->save();

  if($result === true) {
    $new_id = $user->id;
    $session->message('The user was created successfully.');
    redirect_to('index.php');
  } else {
    // show errors
  }

} else {
  // display the form
  $user = new User;
}

?>

<?php $page_title = 'Create User'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>
<main role="main" id="main-content" tabindex="-1">
  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>
    <h1>Create User</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo 'new.php'; ?>" method="post">

      <?php include('form_fields.php'); ?>

        <input type="submit" value="Create Member">
    </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
