<?php require_once('../private/initialize.php');   ?>

<?php $page_title = 'Catalog Search Page'; 
$current_page = 3;
?>

<?php
if(isset($session->user_level)){
  include(SHARED_PATH . '/user_header.php'); 
}
else {
  include(SHARED_PATH . '/public_header.php'); 
} 

$consoles = Console::find_all();
$ratings = AgeRating::find_all();
$genres = Genre::find_all();
$companies = Company::find_all();

?>
<main role="main" id="main-content" tabindex="-1">
  <h1>Search The Catalog</h1>
  <p>Enter in your search criteria below. If you don't care about a particular field, either ignore it, leave it blank, or select "Don't Care".</p>
  <form action="index.php" method="POST">
    <dl>
      <dt><label for="game_name">Game Name</label></dt>
      <dd><input type="text" name="search[name]" id="game_name"></dd>
    </dl>

    <dl>
      <dt><label for="genre">Genre</label></dt>
      <dd>
        <select id="genre" name="search[genre][]" multiple>
        <?php foreach($genres as $genre) { ?>
          <option value="<?php echo $genre->id; ?>"><?php echo$genre->genre_gnr; ?></option>
        <?php } ?>
        </select>
      </dd>
    </dl>

    <dl>
      <dt><label for="console">Console</label></dt>
      <dd>
        <select id="console" name="search[console][]" multiple>
        <?php foreach($consoles as $console) { ?>
          <option value="<?php echo $console->id; ?>"><?php echo $console->name_con; ?></option>
        <?php } ?>
        </select>
      </dd>
    </dl>

    <dl>
      <dt><label for="publisher">Publisher</label></dt>
      <dd><input type="text" id="publisher" name="search[company]"></dd>
    </dl>

    <dl>
      <dt><label for="rating">ESRB Rating</label></dt>
      <dd>
        <select id="rating" name="search[rating][]" multiple>
        <?php foreach($ratings as $rating) { ?>
          <option value="<?php echo $rating->id; ?>"><?php echo $rating->esrb_rating_age; ?></option>
        <?php } ?>
        </select>
      </dd>
    </dl>

    <dl>
      <dt><label for="condition">Minimum Condition</label></dt>
      <dd>
        <select id="condition" name="search[condition]">
          <option value="">Don't Care</option>
        <?php foreach(InventoryItem::$conditions as $condition) { ?>
          <option value="<?= $condition?>"><?= $condition ?></option>
        <?php } ?>
        </select>
      </dd>
    </dl>

    <dl>
      <dt><label for="available">Availability</label></dt>
      <dd>
        <select id="available" name="search[availability]">
          <option value="">Don't Care</option>
          <option value="available">Available</option>
          <option value="unavailable">Unavailable</option>
        </select>
      </dd>
    </dl>

    <dl>
      <dt><label for="sort_by">Sort By</label></dt>
      <dd>
        <select id="sort_by" name="search[sort]">
          <option value="name_gme">Game Name</option>
          <option value="id_gnr_gme">Genre</option>
          <option value="name_con">Console</option>
          <option value="name_cmp">Publisher</option>
          <option value="id_age_gme">ESRB Rating</option>
          <option value="condition_inv">Condition</option>
          <option value="available_inv">Availability</option>
        </select>
      </dd>
    </dl>

    <dl>
      <dt><label for="order_by">Order</label></dt>
      <dd>
        <select id="order_by" name="search[order]">
          <option value="ASC">Ascending</option>
          <option value="DESC">Descending</option>
        </select>
      </dd>
    </dl>

    <input type="submit" value="Search The Catalog">
  </form>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
