<?php
require('../../backend/config.php');
require('../../backend/langs/config.php');
require('../../backend/accounts.php');
if (!empty($_SESSION['nkm-5jkl'])) {
  header('location: /profiles/my');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $board_title ?> - <?php echo $locale_login ?></title>
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
      <div id="installdiv"><h2><?php echo $locale_login ?></h2><div class="alert alert-info"><?php echo $board_msg ?></div>
      <!-- SUBHEADER START -->

      <!-- FORM START -->
      <form method="post">
        <input placeholder="<?php echo $locale_username ?>" id="username" name="username" class="form-control text-ltr" size="70">
        <br>
        <input placeholder="<?php echo $locale_password ?>" id="password" type="password" name="password" class="form-control text-ltr" size="70">
        <br>
        <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="login" id="login" type="submit"><?php echo $locale_login ?></button>
      </form>
      <!-- FORM END -->
      <?php include('../../frontend/footer.php') ?>
    </div>
  </body>
</html>
