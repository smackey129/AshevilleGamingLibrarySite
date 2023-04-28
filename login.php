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
        $errors[] = "Username and password do not match.";
    }
  }
}

?>

<?php $page_title = 'Log in'; ?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Log in</h1>
  <a href="login.php">Not already a member? Sign up here!</a>
  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" name="username" value="<?php echo h($username); ?>"  id="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" value="" id="password" required>
    <script src="<?= url_for('js/captchaSetup.js')?>" async defer></script>
    <div
        class="g-recaptcha"
        data-sitekey="6Lef7polAAAAALA3a2Q57-04Q0dGvvOsmu-5_mC-"
        data-callback="callback"
      >
    </div>
    <br>
    <input type="submit" name="submit" id="submit-button" value="Log In">
    <a href="<?= url_for('forgotpassword.php')?>">Forgot Password?</a>
  </form>
  

</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
