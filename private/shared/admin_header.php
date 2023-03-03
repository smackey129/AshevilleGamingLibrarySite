<?php
  if(!isset($page_title)) { $page_title = 'Page Title'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/css.css'); ?>">
  </head>

  <body>
    <header>
      <h1>
        <a href="<?php echo url_for('index.php'); ?>">
          Asheville Gaming Library
        </a>
      </h1>
    </header>
    <navigation>

        <?php 
        require_admin();
        echo "<div id='user_links'>";
        echo "<span>Welcome ". $session->username . "!</span><br>";
        echo "<a href='". url_for("/profile") ."'>User Profile</a> ";
        echo "<a href='". url_for("/admin") ."'>Enter Admin Area</a> ";
        echo "<a href='". url_for("logout.php") ."'>Logout</a><br>";
        echo "</div>";
        include(SHARED_PATH . "/navbar.php");
        ?>
        
    </navigation>


    <?php echo display_session_message(); ?>
