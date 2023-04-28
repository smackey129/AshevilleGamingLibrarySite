<?php

function require_login() {
  global $session;
  if(!$session->is_logged_in()){
    redirect_to(url_for('login.php'));
  }

}

function require_admin() {
  global $session;
  require_login();
  if($session->user_level != 'admin') {
    redirect_to(url_for('index.php'));
  }
}

function display_errors($errors=array()) {
  $output = '';
  $nonArray = false;
  foreach($errors as $error) {
    if(!is_array($error)){
      $nonArray = true;
    }
  }
  if(!empty($errors) && $nonArray) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      if(!is_array($error)){
        $output .= "<li>" . h($error) . "</li>";
      }
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
