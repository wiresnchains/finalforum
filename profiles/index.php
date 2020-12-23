<?php
require('../backend/mysql_connect.php');
require('../backend/config.php');
require('../backend/functions.php');
require('../backend/accounts.php');
require('../backend/langs/config.php');
$username = $_GET['name'];
$query = mysqli_query($sql, "SELECT username, reg_date FROM ff_accounts WHERE username='$username'");
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
        <?php include('../frontend/navbar.php'); ?>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $username ?>'s <?php echo $locale_profile ?></h2>
      <!-- SUBHEADER START -->

      <!-- PROFILE START -->
      <?php
        if ($count > 0) {
          echo "<div class='bg-light p-3 mb-3'>";
          echo "<h4>UID: " . $row['id'] . "</h4>";
          echo "<h4>" . $locale_username . ": " . $username . "</h4>";
          echo "<h4>" . $locale_regdate . ": " . $row['reg_date'] . "</h4>";
          echo "</div>";
          echo "<h4>" . $locale_comments . "</h4>";
          renderComments($username);
          echo "<form method='post' action='index.php?name=" . $username . "'>";
          echo "<textarea placeholder='" . $locale_post_comment . "' id='comment_container' name='comment_container' class='form-control text-ltr' size='70'></textarea>";
          echo "<input id='current_profile' name='current_profile' type='hidden' value='" . $username . "'><br>";
          echo "<button id='post_comment' name='post_comment' class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit'>" . $locale_post . "</button>";
          echo "</form>";
          echo "<br>";
        }
        else {
          echo "<p>" . $locale_failed_to_load_profile . "</p>";
        }
      ?>
      <!-- PROFILE END -->
      <a href="/"><button class="btn btn-primary ml-1 flex-grow-0 mr-auto"><?php echo $locale_back ?></button></a>
      <br>
      <?php include('../frontend/footer.php') ?>
    </div>
  </body>
</html>
