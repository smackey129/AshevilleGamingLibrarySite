<?php
  if(!isset($page_title)) { $page_title = 'Page Title'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>Asheville Gaming Library - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" /> -->
  </head>

  <body>
    <header>
      <h1>Asheville Gaming Library - Logged In</h1>
    </header>
    <navigation>

        <?php 
        require_login();
        echo "Username: ". $session->username . "<br>";
        echo "User Level: ". $session->user_level ."<br>";

        echo "<a href='". url_for("logout.php") ."'>Logout</a><br>";
        ?>

    </navigation>


    <?php echo display_session_message(); ?>
