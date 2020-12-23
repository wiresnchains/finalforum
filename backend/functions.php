<?php
function listThreads() {
  require('mysql_connect.php');
  $query = mysqli_query($sql, "SELECT id, thread_name, thread_author, post_date FROM ff_threads ORDER BY post_date DESC LIMIT 10");

  while($row = mysqli_fetch_array($query))
  {
    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'><a href='/threads/index.php?id=" . $row['id'] . "'>" . $row['thread_name'] . "</a></h3><a href='/profiles/index.php?name=" . $row['thread_author'] . "'><small>" . $row['thread_author'] . "</small></a>";
    echo "</div>";
  }
}

function renderReplies($parent_thread) {
  require('mysql_connect.php');
  $query = mysqli_query($sql, "SELECT parent_thread, reply_container, author FROM ff_replies WHERE parent_thread='$parent_thread'");

  while($row = mysqli_fetch_array($query))
  {
    $reply_con = str_replace("
", "<br>", $row['reply_container']);

    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'>" . $reply_con . "</a></h3><a href='/profiles/index.php?name=" . $row['author'] . "'><small>" . $row['author'] . "</small></a>";
    echo "</div>";
  }
}

function renderAdminThreads() {
  require('mysql_connect.php');
  require('langs/config.php');
  require('threads.php');
  $query = mysqli_query($sql, "SELECT id, thread_name, thread_author, post_date FROM ff_threads ORDER BY post_date DESC"); // LIMIT 10

  while($row = mysqli_fetch_array($query))
  {
    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'><a href='/threads/index.php?id=" . $row['id'] . "'>" . $row['thread_name'] . "</a></h3><a href='/profiles/index.php?name=" . $row['thread_author'] . "'><small>" . $row['thread_author'] . "</small></a>";
    echo "<br><form method='post'><input id='thread_id' name='thread_id' value=" . $row['id'] . " type='hidden'><button class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit' name='remove_thread' id='remove_thread'>" . $locale_delete_thread . "</button></form>";
    echo "</div>";
  }
}

function renderAdminReplies() {
  require('mysql_connect.php');
  require('langs/config.php');
  require('threads.php');
  $query = mysqli_query($sql, "SELECT * FROM ff_replies");

  while($row = mysqli_fetch_array($query))
  {
    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'><a href='/threads/index.php?id=" . $row['parent_thread'] . "'>" . $row['reply_container'] . "</a></h3><a href='/profiles/index.php?name=" . $row['author'] . "'><small>by " . $row['author'] . "</small></a>";
    echo "<br><form method='post'><input id='thread_id' name='thread_id' value=" . $row['id'] . " type='hidden'><button class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit' name='remove_reply' id='remove_reply'>" . $locale_delete_reply . "</button></form>";
    echo "</div>";
  }
}

function renderUsers() {
  require('mysql_connect.php');
  require('langs/config.php');
  $query = mysqli_query($sql, "SELECT * FROM ff_accounts");

  while($row = mysqli_fetch_array($query))
  {
    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'><a href='/profiles/index.php?name=" . $row['username'] . "'>" . $row['username'] . "</a></h3>";
    echo "<br><form method='post'><input id='user_name' name='user_name' value=" . $row['username'] . " type='hidden'><button class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit' name='delete_user' id='delete_user'>" . $locale_delete_user . "</button></form>";
    echo "<br><form method='post'>";
    echo "<h4>" . $locale_user_control . "</h4>";
    echo "<p>" . $locale_username . "</p>";
    echo "<input id='user_id' name='user_id' value=" . $row['id'] . " type='hidden'>";
    echo "<input placeholder=" . $locale_username . " id='username' name='username' value=" . $row['username'] . " class='form-control text-ltr' size='70'><br>";
    echo "<p>" . $locale_new_password . "</p>";
    echo "<input type='password' id='password' name='password' class='form-control text-ltr' size='70'><br>";
    echo "<button class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit' name='edit_user' id='edit_user'>" . $locale_save . "</button>";
    echo "</form>";
    echo "</div>";
  }
}

function renderAdmins() {
  require('mysql_connect.php');
  require('langs/config.php');
  $query = mysqli_query($sql, "SELECT * FROM ff_admins");

  while($row = mysqli_fetch_array($query))
  {
    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'>" . $row['username'] . "</h3>";
    echo "<br><form method='post'><input id='user_name' name='user_name' value=" . $row['username'] . " type='hidden'><button class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit' name='delete_admin' id='delete_admin'>" . $locale_delete_admin . "</button></form>";
    echo "<br><form method='post'>";
    echo "<h4>" . $locale_admin_control . "</h4>";
    echo "<p>" . $locale_username . "</p>";
    echo "<input id='user_id' name='admin_id' value=" . $row['id'] . " type='hidden'>";
    echo "<input placeholder=" . $locale_username . " id='username' name='username' value=" . $row['username'] . " class='form-control text-ltr' size='70'><br>";
    echo "<p>" . $locale_new_password . "</p>";
    echo "<input type='password' id='password' name='password' class='form-control text-ltr' size='70'><br>";
    echo "<button class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit' name='edit_admin' id='edit_admin'>" . $locale_save . "</button>";
    echo "</form>";
    echo "</div>";
  }
}

function renderComments($parent_profile) {
  require("mysql_connect.php");
  require("langs/config.php");

  $query = mysqli_query($sql, "SELECT * FROM ff_profile_comments WHERE parent_profile='$parent_profile'");

  while($row = mysqli_fetch_array($query))
  {
    $comment_con = str_replace("
", "<br>", $row['comment_container']);

    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'>" . $comment_con . "</a></h3><a href='/profiles/index.php?name=" . $row['comment_author'] . "'><small>" . $row['comment_author'] . "</small></a>";

    if ($_SESSION['nkm-5jkl'] == $row['comment_author'] || $_SESSION['nkm-5jkl'] == $row['parent_profile']) {
      echo "<br><form method='post'>";
      echo "<input type='hidden' name='comment_id' id='comment_id' value='" . $row['id'] . "'>";
      echo "<br><button id='remove_comment' name='remove_comment' class='btn btn-primary ml-1 flex-grow-0 mr-auto' type='submit'>" . $locale_delete_comment . "</button>";
      echo "</form>";
    }
    echo "</div>";
  }
}
?>
