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
?>
