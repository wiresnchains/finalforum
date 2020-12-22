<?php
require('mysql_connect.php');

session_start();

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($sql, $_POST['username']);
  $password = md5(mysqli_real_escape_string($sql, $_POST['password']));

  $query = mysqli_query($sql, "SELECT username, password FROM ff_accounts WHERE username = '$username' AND password = '$password'");
  $count = mysqli_num_rows($query);

  if ($count > 0) {
    $_SESSION['nkm-5jkl'] = $username;
    header('location: /profiles/my');
  }
  else {
    echo $locale_incorrect_credentials;
  }
}

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($sql, $_POST['username']);
  $password = md5(mysqli_real_escape_string($sql, $_POST['password']));
  $regdate = date("y-m-d");

  if ($username == "" || $password == "") {
    echo $locale_fillform;
  }
  else {
    $query = mysqli_query($sql, "SELECT username FROM ff_accounts WHERE username = '$username'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
      echo $locale_login_taken;
    }
    else {
      $query_reg = mysqli_query($sql, "INSERT INTO ff_accounts (username, password, reg_date) VALUES ('$username', '$password', '$regdate')");
      $_SESSION['nkm-5jkl'] = $username;
      header('location: /profile/my');
    }
  }
}

if (isset($_POST['logout'])) {
  unset($_SESSION['nkm-5jkl']);
  session_destroy();
}
?>
