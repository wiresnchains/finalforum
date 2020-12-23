<?php
require('../backend/mysql_connect.php');
require('../backend/config.php');
require('../backend/langs/config.php');
require('../backend/threads.php');
require('../backend/functions.php');
$id = $_GET['id'];
$query = mysqli_query($sql, "SELECT * FROM ff_threads WHERE id='$id'");
$count = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $row['thread_name']; echo " - "; echo $locale_thread; ?></title>
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
        <div class="bg-light p-3 mb-3">
          <a href="/"><h3 class="m-0" style="display: inline"><?php echo $locale_home ?></h3></a>
          <a href="/admin"><h3 class="m-0" style="display: inline"><?php echo $locale_admin ?></h3></a>
        </div>
      </div>
      <!-- HEADER END -->

      <!-- SUBHEADER START -->
      <div id="installdiv"><h2><?php echo $row['thread_name']; ?></h2>
      <!-- SUBHEADER START -->

      <!-- THREAD START -->
      <?php
        if ($count > 0) {
          $thread_con = str_replace("
", "<br>", $row['thread_container']);

          echo "<div class='bg-light p-3 mb-3'>";
          echo "<h4>" . $thread_con . "</h4>";
          echo "<a href='/profiles?name=" .  $row['thread_author'] . "'<small>by " .  $row['thread_author'] . "</small></a><br><small>" . $locale_posted_at . " " .  $row['post_date'] . "</small>";
          if ($_SESSION['nkm-5jkl'] == $row['thread_author']) {
            echo "<br><form method='post'>";
            echo "<input type='hidden' name='thread_id' id='thread_id' value='" . $row['id'] . "'>";
            echo "<br><button id='remove_thread' name='remove_thread' class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit'>" . $locale_delete_thread . "</button>";
            //echo "<button type='submit' id='edit_thread' name='edit_thread' class='btn btn-primary ml-1 flex-grow-0 mr-auto'>" . $locale_edit_thread . "</button>";
            echo "</form>";
          }
          echo "</div>";
          // replies
          echo "<h4>" . $locale_replies . "</h4>";
          renderReplies($id);
          echo "<form method='post' action='index.php?id=" . $id . "'>";
          echo "<div class='row mb-4'>";
          echo "<div class='col-md-3 text-md-right pt-1'><label for='id_dataroot'>" . $locale_post_reply . "</label></div>";
          echo "<div class='col-md-9' data-fieldtype='text'><textarea id='reply_container' name='reply_container' class='form-control text-ltr' size='70'></textarea></div></div>";
          echo "<input id='current_thread' name='current_thread' type='hidden' value='" . $id . "'>";
          echo "<button type='submit' name='post_reply' class='btn btn-primary ml-1 flex-grow-0 mr-auto'>" . $locale_post . "</button>";
          echo "</form>";
          echo "<br>";
        }
        else {
          echo "<p>" . $locale_failed_to_load_thread . "</p>"; // Failed to load thread :(
        }
      ?>
      <!-- THREAD END -->
      <?php include('../frontend/footer.php') ?>
    </div>
  </body>
</html>
