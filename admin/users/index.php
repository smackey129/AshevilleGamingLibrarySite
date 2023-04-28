<?php 
  require_once('../../private/initialize.php');   
  $users = User::find_all();
  $page_title = 'Users'; 
  include(SHARED_PATH . '/admin_header.php'); 
?>
<main role="main" id="main-content" tabindex="-1">
  <a href='<?= url_for("/admin") ?>'>&laquo; Back to Admin Area</a><br>
  <h1>Users</h1>
  <a href='new.php' class="button">Create New User</a>
  <div class="table">
    <table>
      <tr>
        <th>Username</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>

      <?php foreach($users as $user) { ?>
        <tr>
          <td><?= h($user->username_usr); ?></td>
          <td><a href="<?php echo url_for('admin/users/show.php?id=' . h(u($user->id))); ?>">View</a></td>
          <td><a href="<?php echo url_for('admin/users/edit.php?id=' . h(u($user->id))); ?>">Edit</a></td>
          <td><a href="<?php echo url_for('admin/users/delete.php?id=' . h(u($user->id))); ?>">Delete</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</main>
<?php include(SHARED_PATH . '/user_footer.php'); ?>
