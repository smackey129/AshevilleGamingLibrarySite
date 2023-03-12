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
?>

<dl>
  <dt><label for="item[id_gme_inv]">Game</label></dt>
  <dd>
    <select name="item[id_gme_inv]" id="item[id_gme_inv]" required>
      <option value="">Select Game</option>
    <?php foreach($games as $game) { ?>
      <option value="<?php echo $game->id; ?>" <?php if($item->id_gme_inv == $game->id) { echo 'selected'; } ?>><?php echo $game->name_gme; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

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

<dl>
  <dt><label for="item[id_usr_inv]">Current User</label></dt>
  <dd>
    <select name="item[id_usr_inv]" id="item[id_usr_inv]">
      <option value="">Not Currently Checked Out</option>
    <?php foreach($users as $user) { ?>
      <option value="<?php echo $user->id; ?>" <?php if($item->id_usr_inv == $user->id) { echo 'selected'; } ?>><?php echo $user->username_usr; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for="item[id_usrdonator_inv]">Donator</label></dt>
  <dd>
    <select name="item[id_usrdonator_inv]" id="item[id_usrdonator_inv]" required>
      <option value="">Select Donator</option>
    <?php foreach($users as $user) { ?>
      <option value="<?php echo $user->id; ?>" <?php if($item->id_usrdonator_inv == $user->id) { echo 'selected'; } ?>><?php echo $user->username_usr; ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Available?</dt>
  <dd><input type="radio" name="item[available_inv]" id="availableYes" value="1" required <?php if($item->getAvailability() == 'Yes') {echo "checked='true'";}?>>
  <label for="availableYes">Yes</label><br>
  <input type="radio" name="item[available_inv]" id="availableNo" value="0" required <?php if($item->getAvailability() == 'No') {echo "checked='true'";}?> >
  <label for="availableNo">No</label>
  </dd>
</dl>


<dl>
  <dt><label for="item[available_after_inv]">Available After/Due By:</label></dt>
  <dd><input type="date" name="item[available_after_inv]" value="<?= $item->available_after_inv?>" id="item[available_after_inv]" required>
  </dd>
</dl>