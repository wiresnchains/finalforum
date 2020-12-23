<?php
require('mysql_connect.php');
require('accounts.php');

if (isset($_POST['create_thread'])) {
  if (!empty($_SESSION['nkm-5jkl'])) {
    $name = mysqli_real_escape_string($sql, $_POST['thread_title']);
    $container = mysqli_real_escape_string($sql, $_POST['thread_message']);
    $author = $_SESSION['nkm-5jkl'];
    $datetime = date("Y/m/d H:i:s");

    if ($name == "" || $container == "") {
      echo $locale_fillform;
    }
    else {
      $query = mysqli_query($sql, "INSERT INTO ff_threads (thread_name, thread_author, thread_container, post_date) VALUES ('$name', '$author', '$container', '$datetime')");
      $id = mysqli_insert_id($sql);
      header('location: /threads/index.php?id=' . $id);
    }
  }
  else {
    header('location: /profiles/login');
  }
}

if (isset($_POST['post_reply'])) {
  if (!empty($_SESSION['nkm-5jkl'])) {
    $container = mysqli_real_escape_string($sql, $_POST['reply_container']);
    $thread = mysqli_real_escape_string($sql, $_POST['current_thread']);
    $author = $_SESSION['nkm-5jkl'];

    if ($container == "" || $thread == "") {
      echo $locale_fillform;
    }
    else {
      $query = mysqli_query($sql, "INSERT INTO ff_replies (parent_thread, reply_container, author) VALUES ('$thread', '$container', '$author')");
    }
  }
  else {
    header('location: /profiles/login');
  }
}

if (isset($_POST['remove_thread'])) {
  $thread_id = mysqli_real_escape_string($sql, $_POST['thread_id']);
  $query_3 = mysqli_query($sql, "SELECT thread_author FROM ff_threads WHERE id='$thread_id'");
  $row = mysqli_fetch_assoc($query_3);

  if ($_SESSION['nkm-5jkl'] == $row['thread_author']) {
    // delete thread
    $query = mysqli_query($sql , "DELETE FROM ff_threads WHERE id='$thread_id'");

    // delete thread replies
    $query_2 = mysqli_query($sql , "DELETE FROM ff_replies WHERE parent_thread='$thread_id'");

    header('location: /');
  }
}

if (isset($_POST['remove_reply'])) {
  $reply_id = mysqli_real_escape_string($sql, $_POST['reply_id']);
  $query_3 = mysqli_query($sql, "SELECT author FROM ff_replies WHERE id='$reply_id'");
  $row = mysqli_fetch_assoc($query_3);

  if ($_SESSION['nkm-5jkl'] == $row['author']) {
    // delete reply
    $query = mysqli_query($sql , "DELETE FROM ff_replies WHERE id='$reply_id'");
  }
}
?>
