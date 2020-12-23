<?php
require('../../backend/mysql_connect.php');
require('../../backend/config.php');
require('../../backend/accounts.php');
require('../../backend/langs/config.php');
require('../../backend/functions.php');
if (empty($_SESSION['nkm-5jkl'])) {
  header('location: /');
}
$username = $_SESSION['nkm-5jkl'];
$query = mysqli_query($sql, "SELECT id, username, reg_date FROM ff_accounts WHERE username='$username'");
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $board_title ?> - <?php echo $locale_profile ?></title>
    <link rel="stylesheet" href="/frontend/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain"><?php echo $board_title ?></h1>
          <div class="headermenu">&nbsp;</div>
        </div>
        <?php include('../../frontend/navbar.php'); ?>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $locale_my_profile ?></h2>
      <!-- SUBHEADER START -->

      <!-- PROFILE START -->
      <div class='bg-light p-3 mb-3'>
        <h4>UID: <?php echo $row['id']; ?></h4>
        <h4><?php echo $locale_username; ?>: <?php echo $row['username']; ?></h4>
        <h4><?php echo $locale_regdate; ?>: <?php echo $row['reg_date']; ?></h4>
      </div>
      <?php
      echo "<h4>" . $locale_comments . "</h4>";
      renderComments($row['username']);
      ?>
      <!-- PROFILE END -->
      <a href="/"><form method="post"><button class="btn btn-primary ml-1 flex-grow-0 mr-auto" type="submit" id="logout" name="logout"><?php echo $locale_exit ?></button></form></a>
      <?php include('../../frontend/footer.php') ?>
    </div>
  </body>
</html>
