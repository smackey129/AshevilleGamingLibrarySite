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
    $session->login($user);
    redirect_to("confirmedit.php");
  } else {
    // show errors
  }

} else {

  // display the form

}

?>

<?php $page_title = 'Edit My Information'; ?>
<?php include(SHARED_PATH . '/user_header.php'); ?>

<main role="main" id="main-content" tabindex="-1">

  <h1>Edit My Information</h1>
  <p>All fields marked with "*" must not be blank</p>
  <?php echo display_errors($user->errors); ?>

  <form action="editinfo.php" method="post">

    <?php include('profile_form_fields.php'); ?>

    <input type="submit" value="Save Changes">
  </form>


</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
