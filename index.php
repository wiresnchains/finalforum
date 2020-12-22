<?php
if (!file_exists("backend/mysql_connect.php")) {
  header('location: /backend/install.php');
}
require('backend/config.php');
require('backend/functions.php');
require('backend/langs/config.php');
require('backend/accounts.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $board_title ?> - <?php echo $locale_home ?></title>
    <link rel="stylesheet" href="frontend/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain"><?php echo $board_title ?></h1>
          <div class="headermenu">&nbsp;</div>
        </div>
        <?php include('frontend/navbar.php'); ?>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $locale_forums ?></h2><div class="alert alert-info"><?php echo $board_msg ?></div>
      <!-- SUBHEADER START -->

      <!-- THREAD LIST START -->
      <a href="threads/create.php"><button class="btn btn-primary ml-1 flex-grow-0 mr-auto"><?php echo $locale_create_thread ?></button></a>
      <br>
      <br>
      <?php listThreads(); ?>
      <p><?php echo $locale_no_more_threads ?></p>
      <!-- THREAD LIST END -->
    </div>
  </body>
</html>
