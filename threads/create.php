<?php
include '../backend/langs/config.php';
include '../backend/threads.php';
include '../backend/config.php';
include '../backend/accounts.php';
if (empty($_SESSION['nkm-5jkl'])) {
  header('location: /');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $board_title ?> - <?php echo $locale_create_thread ?></title>
    <link rel="stylesheet" href="/frontend/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain"><?php echo $locale_create_thread ?></h1>
          <div class="headermenu">&nbsp;</div>
        </div>
        <?php include('../frontend/navbar.php'); ?>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $locale_forums ?></h2><div class="alert alert-info"><?php echo $board_msg ?></div>
      <!-- SUBHEADER START -->

      <!-- INSTALL START -->
      <form method="post">
        <div class="row mb-4">
          <div class="col-md-9" data-fieldtype="text">
            <div class="bg-light p-3 mb-3">
              <h4><?php echo $locale_thread_info ?></h4>
              <input placeholder="<?php echo $locale_thread_title ?>" id="thread_title" name="thread_title" class="form-control text-ltr" size="70">
              <br>
              <input placeholder="<?php echo $locale_thread_message ?>" id="thread_message" name="thread_message" class="form-control text-ltr" size="70">
            </div>
          </div>
        </div>
        <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="create_thread" id="create_thread" type="submit"><?php echo $locale_post ?></button>
      </form>
      <!-- INSTALL END -->
    </div>
  </body>
</html>
