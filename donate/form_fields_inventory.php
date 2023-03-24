<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($item)) {
  redirect_to(url_for('index.php'));
}
?>

<?php 
  $games = Game::getGamesAlphabetized();
  $consoles = Console::find_all();
  $users = User::find_all();
  $ratings = AgeRating::find_all();
  $genres = Genre::find_all();
  $companies = Company::find_all();
?>

<dl>
  <dt><label for="item[id_gme_inv]">Game (If it isn't listed, select the "Not Listed" option)</label></dt>
  <dd>
    <select name="item[id_gme_inv]" id="item[id_gme_inv]" required>
      <option value="">Select Game</option>
      <option value="-1">Not Listed</option>
    <?php foreach($games as $game) { ?>
      <option value="<?php echo $game->id; ?>" <?php if($item->id_gme_inv == $game->id) { echo 'selected'; } ?>><?php echo $game->name_gme; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<fieldset id="new_game_form">
  <legend>Can't find a game? Enter the details here.</legend>
  <dl>
    <dt><label for="game[name_gme]">Game Name</label></dt>
    <dd><input type="text" name="game[name_gme]" id="game[name_gme]"></dd>
  </dl>

  <dl>
    <dt><label for="game[id_age_gme]">ESRB Rating</label></dt>
    <dd>
      <select name="game[id_age_gme]" id="game[id_age_gme]">
      <option value="">Select ESRB Rating</option>
      <?php foreach($ratings as $rating) { ?>
        <option value="<?php echo $rating->id; ?>"><?php echo $rating->esrb_rating_age; ?></option>
      <?php } ?>
      </select>
    </dd>
  </dl>

  <dl>
    <dt><label for="game[id_gnr_gme]">Genre</label></dt>
    <dd>
      <select name="game[id_gnr_gme]" id="game[id_gnr_gme]">
      <option value="">Select Genre</option>
      <?php foreach($genres as $genre) { ?>
        <option value="<?php echo $genre->id; ?>"><?php echo $genre->genre_gnr; ?></option>
      <?php } ?>
      </select>
    </dd>
  </dl>

  <dl>
    <dt><label for="game[id_cmppub_gme]">Publisher</label></dt>
    <dd>
      <select name="game[id_cmppub_gme]" id="game[id_cmppub_gme]">
      <option value="">Select Publisher</option>
      <?php foreach($companies as $publisher) { ?>
        <option value="<?php echo $publisher->id; ?>"><?php echo $publisher->name_cmp; ?></option>
      <?php } ?>
      </select>
    </dd>
  </dl>
</fieldset>

<script src="<?= url_for('js/newGame.js')?>" defer></script>

<dl>
  <dt><label for="item[id_con_inv]">Console</label></dt>
  <dd>
    <select name="item[id_con_inv]" id="item[id_con_inv]" required>
      <option value="">Select Console</option>
    <?php foreach($consoles as $console) { ?>
      <option value="<?php echo $console->id; ?>" <?php if($item->id_con_inv == $console->id) { echo 'selected'; } ?>><?php echo $console->name_con; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for="item[condition_inv]">Condition</label></dt>
  <dd>
    <select name="item[condition_inv]" id="item[condition_inv]" required>
      <option value="">Select Condition</option>
      
      <?php foreach(InventoryItem::$conditions as $condition) { ?>
        <option value="<?= $condition?>" <?php if($item->condition_inv == $condition) {echo 'selected';} ?>><?= $condition ?></option>
      <?php } ?>
    </select>
  </dd>
</dl>