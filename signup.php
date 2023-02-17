<?php
require_once('private/initialize.php');

if(is_post_request()) {

  // Create record using post parameters
  $args = $_POST['user'];
  $user = new User($args);
  $result = $user->save();

  if($result === true) {
    $new_id = $user->id;
    $session->message('The user was created successfully.');
    // redirect_to(url_for('databaseContent.php'));
  } else {
    // show errors
  }

} else {
  // display the form
  $user = new User;
}

?>

<?php $page_title = 'Create User'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

    <h1>Create User</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('signup.php'); ?>" method="post">

      <?php include('users/form_fields.php'); ?>

        <input type="submit" value="Create Member" />
    </form>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
