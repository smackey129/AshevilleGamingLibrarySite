<?php
  if(!isset($page_title)) { $page_title = 'Page Title'; }
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" /> -->
  </head>

  <body>
    <header>
      <h1>Asheville Gaming Library</h1>
    </header>
    <navigation>

        <?php 
        require_login();
        echo "Welcome ". $session->username . "!<br>";
        echo "<a href='". url_for("/profile") ."'>User Profile</a> ";
        if($session->user_level == 'admin'){
          echo "<a href='". url_for("/admin") ."'>Enter Admin Area</a> ";
        }
        echo "<a href='". url_for("logout.php") ."'>Logout</a><br>";
        include(SHARED_PATH . "/navbar.php");
        ?>
        
    </navigation>


    <?php echo display_session_message(); ?>
