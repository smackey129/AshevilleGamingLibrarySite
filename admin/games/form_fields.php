<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($game)) {
  redirect_to(url_for('index.php'));
}
$ratings = AgeRating::find_all();
$genres = Genre::find_all();
$companies = Company::find_all();
?>

<?php if(array_key_exists("name", $game->errors)) {echo display_errors($game->errors["name"]);} ?>
<dl>
  <dt><label for="game[name_gme]">* Game Name</label></dt>
  <dd><input type="text" name="game[name_gme]" value="<?php echo h($game->name_gme); ?>" id="game[name_gme]" required></dd>
</dl>

<?php if(array_key_exists("age", $game->errors)) {echo display_errors($game->errors["age"]);} ?>
<dl>
  <dt><label for="game[id_age_gme]">* ESRB Rating</label></dt>
  <dd>
    <select name="game[id_age_gme]" id="game[id_age_gme]" required>
    <option value="">Select ESRB Rating</option>
    <?php foreach($ratings as $rating) { ?>
      <option value="<?php echo $rating->id; ?>" <?php if($game->id_age_gme == $rating->id) { echo 'selected'; } ?>><?php echo $rating->esrb_rating_age; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<?php if(array_key_exists("genre", $game->errors)) {echo display_errors($game->errors["genre"]);} ?>
<dl>
  <dt><label for="game[id_gnr_gme]">* Genre</label></dt>
  <dd>
    <select name="game[id_gnr_gme]" id="game[id_gnr_gme]" required>
    <option value="">Select Genre</option>
    <?php foreach($genres as $genre) { ?>
      <option value="<?php echo $genre->id; ?>" <?php if($game->id_gnr_gme == $genre->id) { echo 'selected'; } ?>><?php echo $genre->genre_gnr; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<?php if(array_key_exists("publisher", $game->errors)) {echo display_errors($game->errors["publisher"]);} ?>
<dl>
  <dt><label for="game[id_cmppub_gme]">* Publisher</label></dt>
  <dd>
    <select name="game[id_cmppub_gme]" id="game[id_cmppub_gme]" required>
    <option value="">Select Publisher</option>
    <?php foreach($companies as $publisher) { ?>
      <option value="<?php echo $publisher->id; ?>" <?php if($game->id_cmppub_gme == $publisher->id) { echo 'selected'; } ?>><?php echo $publisher->name_cmp; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>
