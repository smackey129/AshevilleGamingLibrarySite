<?php
  if(!isset($current_page)) {
    $current_page = 0;
  }
?>
<ul id="navbar">
  <li><a href=<?= url_for("index.php")?> <?php if($current_page == 1) echo 'class="current-page"';?>>Home</a></li>
  <li><a href=<?= url_for("about.php")?> <?php  if($current_page == 2) echo 'class="current-page"';?>>About Us</a></li>
  <li><a href=<?= url_for("/catalog")?> <?php  if($current_page == 3) echo 'class="current-page"';?>>Catalog</a></li>
  <li><a href=<?= url_for("/donate")?> <?php  if($current_page == 4) echo 'class="current-page"';?>>Donate a Game</a></li>
</ul>