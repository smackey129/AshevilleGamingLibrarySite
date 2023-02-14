<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/public.css'); ?>" /> -->
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('index.php'); ?>">
          Asheville Gaming Library
        </a>
      </h1>
    </header>

    <p>Welcome to the Asheville Gaming Library</p>
  
    <navigation>

        <?php 
        if($session->is_logged_in()) {
        echo "<a href='logout.php'>Logout</a>";
        } else {
          echo "<a href='login.php'>Login</a>";
        }
        include(SHARED_PATH . "/navbar.php");

        ?>

    </navigation>
