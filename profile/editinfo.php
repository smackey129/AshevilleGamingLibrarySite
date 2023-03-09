<?php require_once('../private/initialize.php');   ?>

<?php

$user = User::find_by_username($session->username);
if($user == false) {
  redirect_to('index.php');
}

if(is_post_request()) {

  // Save record using post parameters
  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();
  if($result === true) {
    $session->message('Information Updated');
    $session->login($user);
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit My Information'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<main>

  <div class="bicycle edit">
    <h2>Edit My Information</h2>

    <?php echo display_errors($user->errors); ?>

    <form action="editinfo.php" method="post">

      <?php include('../users/form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Save Changes">
      </div>
    </form>

  </div>

</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
