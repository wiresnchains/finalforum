<?php
require('mysql_connect.php');
require('accounts.php');

if (isset($_POST['give_like_thread'])) {
  if (!empty($_SESSION['nkm-5jkl'])) {
    $like_author = mysqli_real_escape_string($sql, $_POST['like_author']);
    $liked_thread = md5(mysqli_real_escape_string($sql, $_POST['liked_thread']));

    $query = mysqli_query($sql, "INSERT INTO ff_likes (like_author, liked_thread_id) VALUES ('$like_author', '$liked_thread')");
  }
}

if (isset($_POST['give_like_reply'])) {
  if (!empty($_SESSION['nkm-5jkl'])) {
    $like_author = mysqli_real_escape_string($sql, $_POST['like_author']);
    $liked_reply = md5(mysqli_real_escape_string($sql, $_POST['liked_reply']));

    $query = mysqli_query($sql, "INSERT INTO ff_likes (like_author, liked_comment_id) VALUES ('$like_author', '$liked_reply')");
  }
}

function renderLikesThreads($parent_thread) {
  require('mysql_connect.php');
  $query = mysqli_query($sql, "SELECT * FROM ff_likes WHERE liked_thread_id='$parent_thread'");

  while($row = mysqli_fetch_array($query))
  {
    echo "<p><a href='/profiles/index.php?name=" . $row['like_author'] . "'>" . $row['like_author'] . "</a></p>";
  }
}

function renderLikesReplies($parent_reply) {
  require('mysql_connect.php');
  $query = mysqli_query($sql, "SELECT * FROM ff_likes WHERE liked_thread_comment='$parent_reply'");

  while($row = mysqli_fetch_array($query))
  {
    echo "<p><a href='/profiles/index.php?name=" . $row['like_author'] . "'>" . $row['like_author'] . "</a></p>";
  }
}
?>
