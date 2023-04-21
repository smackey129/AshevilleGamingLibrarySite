<?php require_once('private/initialize.php'); ?>

<?php 
$page_title = 'Forgot Password?'; 

include(SHARED_PATH . '/public_header.php'); 

if($session->is_logged_in()) {
  redirect_to("index.html");
}

$errors = [];
$username = '';
$email = '';

if(is_post_request()) {

  $username = $_POST['username'] ?? '';
  $email = $_POST['email'] ?? '';

  // Validations
  if(is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if(is_blank($email)) {
    $errors[] = "Email cannot be blank.";
  }

  if(empty($errors)) {
    $user = User::find_by_username($username);
    if($user != false && $user->email_usr == $email){

      $token = $user->generatePasswordToken();
      $resetLink = $_SERVER['SERVER_NAME']. url_for("passwordreset.php?id=") . $token;
      $to = $user->email_usr;
      $subject = "Password Reset Link";
         
      $message = "<h1>Password Reset for " . $user->username_usr . "</h1>";
      $message .= "<p>The link to reset your password is <a href='". $resetLink ."'>". $resetLink . "</a> This link will expire in 3 hours.</p>";
         
      $header = "From:Asheville Gaming Library <passwordreset@ashevillegameslibrary.com> \r\n";
      $header .= "MIME-Version: 1.0" . "\r\n";
      $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         
      $retval = mail ($to,$subject,$message,$header);
      if( $retval == true ) {
        echo "The password reset link has been sent to email address associated with this account. Be sure to check your junk/spam folder to see if it was moved there";
      } else {
        echo "The password reset email could not be sent.";
      }
    } else {
      // username not found or password does not match
        if($user == false) {
          $errors[] = "Username not found";
        }
        else {
          $errors[] = "Username and email do not match.";
        }
    }
  }
}
?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Forgot Password</h1>
  <p>Enter your username and the email associated with your username</p>
  <?php echo display_errors($errors); ?>
  <form action="forgotpassword.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" name="username" value="<?php echo h($username); ?>"  id="username" required><br>
    <label for="email">Email:</label><br>
    <input type="email" name="email" value="" id="email" required><br>
    <br>
    <script src="<?= url_for('js/captchaSetup.js')?>" async defer></script>
    <div
        class="g-recaptcha"
        data-sitekey="6Lef7polAAAAALA3a2Q57-04Q0dGvvOsmu-5_mC-"
        data-callback="callback"
      >
    </div>
    <br>
    <input type="submit" name="submit" id="submit-button" value="Reset Password">
  </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>