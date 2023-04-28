<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/css.css'); ?>">
  </head>

  <body>
    <div id="content-wrapper">
    <a href="#main-content" id="skip-link">Skip to main content</a>
    <header role="banner">
      <a href="<?php echo url_for('index.php'); ?>"><img src="<?= url_for('images/logo crop 2.png')?>" alt="AshevilleGame Library Logo" width="249" height="96"></a>
      <?php 
        echo "<div id='user_links'>";
        echo "<span>Welcome Guest!</span><br>";
        if($session->is_logged_in()) {
        echo "<a href=". url_for('logout.php') . ">Logout</a>";
        } else {
          echo "<a href=". url_for('login.php') . ">Login</a> ";
          echo "<a href=". url_for('signup.php') . ">Sign Up</a>";
        }
        echo "</div>";
        ?>
    </header>
  
    <nav role="navigation">
      <label for="nav-box" id="nav-trigger">Menu</label>
      <input id="nav-box" type="checkbox">
      <?php include(SHARED_PATH . "/navbar.php"); ?>

    </nav>
