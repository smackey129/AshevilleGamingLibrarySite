<?php

/**
 * Makes sure that a page requires the user to be logged in and redirects them to the home page if they are not
 *
 */
function require_login() {
  global $session;
  if(!$session->is_logged_in()){
    redirect_to(url_for('login.php'));
  }

}

/**
 * Redirects the user to the home page if they are not an admin
 *
 */
function require_admin() {
  global $session;
  require_login();
  if($session->user_level != 'admin') {
    redirect_to(url_for('index.php'));
  }
}

/**
 * Displays any errors from the associated array 
 * 
 * @param String[] An array of errors
 * 
 * @return String An unordered list of errors
 */
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

/**
 * Displays the message associated with the session and then clears it
 *
 * @return  String The message associated with the current user session
 */
function display_session_message() {
  global $session;
  $msg = $session->message();
  if(isset($msg) && $msg != '') {
    $session->clear_message();
    return '<div id="message">' . h($msg) . '</div>';
  }
}

?>
