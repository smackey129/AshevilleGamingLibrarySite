<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/css.css'); ?>">
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
        echo "<div id='user_links'>";
        if($session->is_logged_in()) {
        echo "<a href=". url_for('logout.php') . ">Logout</a>";
        } else {
          echo "<a href=". url_for('login.php') . ">Login</a> ";
          echo "<a href=". url_for('signup.php') . ">Sign Up</a>";
        }
        echo "</div>";
        include(SHARED_PATH . "/navbar.php");

        ?>

    </navigation>
