<?php
require_once('private/initialize.php');
if($session->is_logged_in()) {
  redirect_to(url_for("index.php"));
}
include(SHARED_PATH . '/public_header.php'); 

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$token = $_GET['id'];
$user = User::getUserFromToken($token);


if(is_post_request()) {

  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();
  if($result === true) {
    $user->clearToken();
    $session->message("Your password has been reset!");
    redirect_to(url_for('login.php'));
  }
}

?>

<?php $page_title = 'Reset Password'; ?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Reset Password</h1>
  <?php if($user === false){ ?>
    <p>We're sorry, this link has expired or is otherwise invalid. If you want another password reset link, go to <a href="<?= url_for('forgotpassword.php')?>"><?=$_SERVER['SERVER_NAME'] . url_for('forgotpassword.php')?></a> and enter in your username and password to receive a new link</p>
  <?php } else {?>
  <?php echo display_errors($user->errors); ?>

  <form action='<?=url_for("passwordreset.php?id=") . $token;?>' method="post">
    
    <label for="user[password]">Password</label><br>
    <input type="password" name="user[password]" value="" id="user[password]" required><br>
    <label for="user[confirm_password]">Confirm Password</label><br>
    <input type="password" name="user[confirm_password]" value="" id="user[confirm_password]" required><br>
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
  <?php  } ?>
</main>

<?php include(SHARED_PATH . '/user_footer.php'); ?>
