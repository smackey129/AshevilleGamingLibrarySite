<?php require_once('../../private/initialize.php');   ?>

<?php

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}

$id = $_GET['id'];

$user = User::find_by_id($id);

if($user == false) {
  redirect_to('index.php');
}
?>

<?php $page_title = 'User: ' . h($user->username_usr); ?>
<?php include(SHARED_PATH . '/admin_header.php'); ?>
<div id="content">

  <a class="back-link" href="<?php echo url_for('admin/users/index.php'); ?>">&laquo; Back to List</a>

  

  <h1>User: <?php echo h($user->username_usr); ?></h1>
  <dl>
    <dt>First name</dt>
    <dd><?php echo h($user->fname_usr); ?></dd>
  </dl>

  <dl>
    <dt>Last name</dt>
    <dd><?php echo h($user->lname_usr); ?></dd>
  </dl>

  <dl>
    <dt>Email</dt>
    <dd><?php echo h($user->email_usr); ?></dd>
  </dl>

  <dl>
    <dt>Username</dt>
    <dd><?php echo h($user->username_usr); ?></dd>
  </dl>

  <dl>
    <dt>Street Address</dt>
    <dd><?php echo h($user->street_address_usr); ?></dd>
  </dl>

  <dl>
    <dt>City</dt>
    <dd><?php echo h($user->city_usr); ?></dd>
  </dl>

  <dl>
    <dt>State</dt>
    <dd><?php echo User::getStateNameById($user->id_sta_usr); ?></dd>
  </dl>

  <dl>
    <dt>Zip Code</dt>
    <dd><?php echo h($user->zip_usr); ?></dd>
  </dl>

  <dl>
    <dt>User Level</dt>
    <dd><?php echo h($user->user_level_usr); ?></dd>
  </dl>

<?php include(SHARED_PATH . '/user_footer.php'); ?>