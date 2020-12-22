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
    echo "<div class='bg-light p-3 mb-3'>";
    echo "<h3 class='m-0'>" . $row['reply_container'] . "</a></h3><a href='/profiles/index.php?name=" . $row['author'] . "'><small>" . $row['author'] . "</small></a>";
    echo "</div>";
  }
}
?>
