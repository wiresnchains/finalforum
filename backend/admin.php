<?php
require('mysql_connect.php');

session_start();

if (isset($_POST['admin-login'])) {
  $username = mysqli_real_escape_string($sql, $_POST['username']);
  $password = md5(mysqli_real_escape_string($sql, $_POST['password']));

  $query = mysqli_query($sql, "SELECT username, password FROM ff_admins WHERE username = '$username' AND password = '$password'");
  $count = mysqli_num_rows($query);

  if ($count > 0) {
    $_SESSION['npb-5jkl'] = $username;
    header('location: /admin/view/');
  }
}

if (isset($_POST['admin-logout'])) {
  unset($_SESSION['npb-5jkl']);
  session_destroy();
}

if (isset($_POST['delete_user'])) {
  $id = mysqli_real_escape_string($sql, $_POST['user_name']);

  // delete user
  $query = mysqli_query($sql , "DELETE FROM ff_accounts WHERE username='$id'");

  // delete user threads
  $query_1 = mysqli_query($sql , "DELETE FROM ff_threads WHERE thread_author='$id'");

  // delete user replies
  $query_1 = mysqli_query($sql , "DELETE FROM ff_replies WHERE author='$id'");
}

if (isset($_POST['edit_user'])) {
  $id = mysqli_real_escape_string($sql, $_POST['user_id']);
  $username = mysqli_real_escape_string($sql, $_POST['username']);

  $password = mysqli_real_escape_string($sql, $_POST['password']);
  $hash_psswd = md5($password);

  // update user & check if username already exists
  $query_username = mysqli_query($sql, "SELECT id FROM ff_admins WHERE username='$username'");
  $count = mysqli_num_rows($query_username);

  if ($count > 0) {
    echo $locale_login_taken;
  }
  else {
    $query = mysqli_query($sql , "UPDATE ff_accounts SET username='$username', password='$hash_psswd' WHERE id='$id'");
  }
}

if (isset($_POST['create_admin'])) {
  $username = mysqli_real_escape_string($sql, $_POST['username']);
  $password = md5(mysqli_real_escape_string($sql, $_POST['password']));

  if ($username == "" || $password == "") {
    echo $locale_fillform;
  }
  else {
    $query = mysqli_query($sql, "SELECT username FROM ff_admins WHERE username = '$username'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
      echo $locale_login_taken;
    }
    else {
      $query_reg = mysqli_query($sql, "INSERT INTO ff_admins (username, password) VALUES ('$username', '$password')");
    }
  }
}

if (isset($_POST['edit_admin'])) {
  $id = mysqli_real_escape_string($sql, $_POST['admin_id']);
  $username = mysqli_real_escape_string($sql, $_POST['username']);

  $password = mysqli_real_escape_string($sql, $_POST['password']);
  $hash_psswd = md5($password);

  // update admin & check if username already exists
  $query_username = mysqli_query($sql, "SELECT id FROM ff_admins WHERE username='$username'");
  $count = mysqli_num_rows($query_username);

  if ($count > 0) {
    echo $locale_login_taken;
  }
  else {
    $query = mysqli_query($sql , "UPDATE ff_admins SET username='$username', password='$hash_psswd' WHERE id='$id'");
  }
}

if (isset($_POST['delete_admin'])) {
  $id = mysqli_real_escape_string($sql, $_POST['admin_id']);

  // delete admin
  $query = mysqli_query($sql , "DELETE FROM ff_admins WHERE id='$id'");
}
?>
