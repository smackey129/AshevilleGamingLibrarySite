<?php
  if(!isset($page_title)) { $page_title = 'Page Title'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/css.css'); ?>">
  </head>

  <body>
    <div id="content-wrapper">
    <header>
    <a href="<?php echo url_for('index.php'); ?>"><img src="<?= url_for('images/logo crop 2.png')?>" alt="AshevilleGame Library Logo" width="249" height="96"></a>
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
    <nav>  
      <?php
      include(SHARED_PATH . "/navbar.php");
      ?>
    </nav>


    <?php echo display_session_message(); ?>
