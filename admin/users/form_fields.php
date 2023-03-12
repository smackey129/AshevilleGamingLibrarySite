<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to(url_for('index.php'));
}
?>

<dl>
  <dt><label for="user[fname_usr]">First name</label></dt>
  <dd><input type="text" name="user[fname_usr]" value="<?php echo h($user->fname_usr); ?>" required id="user[fname_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[lname_usr]">Last name</label></dt>
  <dd><input type="text" name="user[lname_usr]" value="<?php echo h($user->lname_usr); ?>" required id="user[lname_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[email_usr]">Email</label></dt>
  <dd><input type="text" name="user[email_usr]" value="<?php echo h($user->email_usr); ?>" required id="user[email_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[username_usr]">Username</label></dt>
  <dd><input type="text" name="user[username_usr]" value="<?php echo h($user->username_usr); ?>" required id="user[username_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[street_address_usr]">Street Address</label></dt>
  <dd><input type="text" name="user[street_address_usr]" value="<?php echo h($user->street_address_usr); ?>" required id="user[street_address_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[city_usr]">City</label></dt>
  <dd><input type="text" name="user[city_usr]" value="<?php echo h($user->city_usr); ?>" required id="user[city_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[id_sta_usr]">State</label></dt>
  <dd>
    <select name="user[id_sta_usr]" required id="user[id_sta_usr]">
      <option value=""></option>
    <?php for($state_id = 1; $state_id <= 51; $state_id++) { ?>
      <option value="<?php echo $state_id; ?>" <?php if($user->id_sta_usr == $state_id) { echo 'selected'; } ?>><?php echo User::getStateNameById($state_id); ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for="user[zip_usr]">Zip Code</label></dt>
  <dd><input type="text" name="user[zip_usr]" value="<?php echo h($user->zip_usr); ?>" required id="user[zip_usr]"></dd>
</dl>

<dl>
  <dt><label for="user[user_level_usr]">User Level</label></dt>
  <dd>
    <select name="user[user_level_usr]" required id="user[user_level_usr]">
      <option value="user" <?php if($user->user_level_usr == "user") {echo 'selected';}?>>User</option>
      <option value="admin" <?php if($user->user_level_usr == "admin") {echo 'selected';}?>>Admin</option>
    </select>
  </dd>
</dl>

<dl>
  <dt><label for="user[password]">Password</label></dt>
  <dd><input type="password" name="user[password]" value="" id="user[password]"></dd>
</dl>

<dl>
  <dt><label for="user[confirm_password]">Confirm Password</label></dt>
  <dd><input type="password" name="user[confirm_password]" value="" id="user[confirm_password]"></dd>
</dl>
