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

  // Save record using post parameters
  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();
  if($result === true) {
    $session->message('The user was updated successfully.');
    redirect_to('show.php?id=' . $id);
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit User'; ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>

<main role="main" id="main-content" tabindex="-1">

  <a class="back-link" href="<?php echo 'index.php'; ?>">&laquo; Back to List</a>

  <div>
    <h1>Edit User</h1>
    <p>All fields marked with "*" must not be blank. If you do not wish to change the password, leave the "Password" and "Confirm Password" fields blank</p>
    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo 'edit.php?id=' . h(u($id)); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit User" />
      </div>
    </form>

  </div>

</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
