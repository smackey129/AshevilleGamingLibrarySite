<?php 
  require_once('../private/initialize.php');   
  $users = User::find_all();
  $page_title = 'Members'; 
  include(SHARED_PATH . '/admin_header.php'); 
?>

<h2>Users</h2>
<div class="table">
<table>
  <tr>
    <th>ID</th>
    <th>First name</th>
    <th>Last name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>User Level</th>
    <th>Balance</th>
  </tr>

  <?php foreach($users as $user) { ?>
    <tr>
      <td><?= h($user->id); ?></td>
      <td><?= h($user->fname_usr); ?></td>
      <td><?= h($user->lname_usr); ?></td>
      <td><?= h($user->email_usr); ?></td>
      <td><?= h($user->username_usr); ?></td>
      <td><?= h($user->street_address_usr); ?></td>
      <td><?= h($user->city_usr); ?></td>
      <td><?= h($user->getStateAbbr()); ?></td>
      <td><?= h($user->user_level_usr); ?></td>
      <td><?= h($user->balance_usr); ?></td>
    </tr>
  <?php } ?>
</table>
</div>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
