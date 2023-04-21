<?php
  if(!isset($page_title)) { $page_title = 'Page Title'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/css.css'); ?>">
  </head>

  <body>
    <div id="content-wrapper">
    <a href="#main-content" id="skip-link">Skip to main content</a>
    <header role="banner">
      <a href="<?php echo url_for('index.php'); ?>"><img src="<?= url_for('images/logo crop 2 white.png')?>" alt="AshevilleGame Library Logo" width="249" height="96"></a>
      <?php 
        require_login();
        echo "<div id='user_links'>";
        echo "<span>Welcome ". $session->username . "!</span><br>";
        echo "<a href='". url_for("/profile") ."'>User Profile</a> ";
        if($session->user_level == 'admin'){
          echo "<a href='". url_for("/admin") ."'>Enter Admin Area</a> ";
        }
        echo "<a href='". url_for("logout.php") ."'>Logout</a><br>";
        echo "</div>";
      ?>
    </header>
    <nav role="navigation"> 
      <label for="nav-box" id="nav-trigger">Menu</label>
      <input id="nav-box" type="checkbox"> 
      <?php
      include(SHARED_PATH . "/navbar.php");
      ?>
    </nav>


    <?php echo display_session_message(); ?>
