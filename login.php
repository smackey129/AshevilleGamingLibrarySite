<?php
require_once('private/initialize.php');
if($session->is_logged_in()) {
  redirect_to(url_for("index.php"));
}
include(SHARED_PATH . '/public_header.php'); 

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if(empty($errors)) {
    $user = User::find_by_username($username);
    // test if user found and password is correct
    if($user != false && $user->verify_password($password)){
      // Mark user as logged in
      $session->login($user); 
      redirect_to(url_for('index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php //include(SHARED_PATH . '/staff_header.php'); ?>

  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Log In"  />
  </form>

</div>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
