<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if(!isset($user)) {
  redirect_to(url_for('index.php'));
}
?>

<dl>
  <dt>First name</dt>
  <dd><input type="text" name="user[fname_usr]" value="<?php echo h($user->fname_usr); ?>"></dd>
</dl>

<dl>
  <dt>Last name</dt>
  <dd><input type="text" name="user[lname_usr]" value="<?php echo h($user->lname_usr); ?>"></dd>
</dl>

<dl>
  <dt>Email</dt>
  <dd><input type="text" name="user[email_usr]" value="<?php echo h($user->email_usr); ?>"></dd>
</dl>

<dl>
  <dt>Username</dt>
  <dd><input type="text" name="user[username_usr]" value="<?php echo h($user->username_usr); ?>"></dd>
</dl>

<dl>
  <dt>Street Address</dt>
  <dd><input type="text" name="user[street_address_usr]" value="<?php echo h($user->street_address_usr); ?>"></dd>
</dl>

<dl>
  <dt>City</dt>
  <dd><input type="text" name="user[city_usr]" value="<?php echo h($user->city_usr); ?>"></dd>
</dl>

<dl>
  <dt>State</dt>
  <dd>
    <select name="user[id_sta_usr]">
      <option value=""></option>
    <?php for($state_id = 1; $state_id <= 51; $state_id++) { ?>
      <option value="<?php echo $state_id; ?>" <?php if($user->id_sta_usr == $state_id) { echo 'selected'; } ?>><?php echo User::getStateNameById($state_id); ?></option>
    <?php } ?>
    </select>
  </dd>
</dl>

<dl>
  <dt>Zip Code</dt>
  <dd><input type="text" name="user[zip_usr]" value="<?php echo h($user->zip_usr); ?>"></dd>
</dl>

<dl>
  <dt>User Level</dt>
  <dd>
    <select name="user[user_level_usr]">
      <option value="user" <?php if($user->user_level_usr == "user") {echo 'selected';}?>>User</option>
      <option value="admin" <?php if($user->user_level_usr == "admin") {echo 'selected';}?>>Admin</option>
    </select>
  </dd>
</dl>

<dl>
  <dt>Password</dt>
  <dd><input type="password" name="user[password]" value=""></dd>
</dl>

<dl>
  <dt>Confirm Password</dt>
  <dd><input type="password" name="user[confirm_password]" value=""></dd>
</dl>
