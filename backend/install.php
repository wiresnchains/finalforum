<?php
include 'install_core.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FinalForum - Installation</title>
    <link rel="stylesheet" href="/frontend/main.css">
  </head>
  <body>
    <div id="page" class="mt-0 container stage0">
      <!-- HEADER START -->
      <div id="page-header">
        <div id="header" class=" clearfix">
          <h1 class="headermain">FinalForum Install</h1>
          <div class="headermenu">&nbsp;</div>
        </div>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $locale_forums ?></h2><div class="alert alert-info">Welcome to FinalForum Installation! Fill out the form and click continue!<br><b>Version: 0.0.3 Beta</b></div>
      <!-- SUBHEADER START -->

      <!-- INSTALL START -->
      <form method="post">
        <div class="row mb-4">
          <div class="col-md-9" data-fieldtype="text">
            <div class="bg-light p-3 mb-3">
              <h4>Board Setup</h4>
              <input placeholder="Board Title" id="board_title" name="board_title" class="form-control text-ltr" size="70">
              <br>
              <input placeholder="Board Message" id="board_message" name="board_message" class="form-control text-ltr" size="70">
              <br>
              <select id="board_locale" name="board_locale" class="form-control text-ltr"><option value="en">English (EN)</option><option value="ru">Русский (RU)</option></select>
            </div>
            <div class="bg-light p-3 mb-3">
              <h4>Mysql Connection</h4>
              <input placeholder="Host" id="mysql_host" name="mysql_host" class="form-control text-ltr" size="70">
              <br>
              <input placeholder="Username" id="mysql_username" name="mysql_username" class="form-control text-ltr" size="70">
              <br>
              <input placeholder="Password" id="mysql_password" name="mysql_password" class="form-control text-ltr" size="70">
              <br>
              <input placeholder="Database" id="mysql_database" name="mysql_database" class="form-control text-ltr" size="70">
            </div>
            <div class="bg-light p-3 mb-3">
              <h4>Administrator Setup</h4>
              <input placeholder="Administrator username" id="admin_username" name="admin_username" class="form-control text-ltr" size="70">
              <br>
              <input placeholder="Administrator password" id="admin_password" name="admin_password" class="form-control text-ltr" size="70">
            </div>
          </div>
        </div>
        <button class="btn btn-primary ml-1 flex-grow-0 mr-auto" name="install_continue" id="install_continue">Continue</button>
        <?php
        if(array_key_exists('install_continue', $_POST)){
           continueinstallation($_POST['board_title'], $_POST['board_message'], $_POST['board_locale'], $_POST['mysql_host'], $_POST['mysql_username'], $_POST['mysql_password'], $_POST['mysql_database'], $_POST['admin_username'], $_POST['admin_password']);
        }
        ?>
      </form>
      <!-- INSTALL END -->
    </div>
  </body>
</html>
