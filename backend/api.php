<?php
require('mysql_connect.php');
$call = $_GET['call'];
$token = $_GET['token'];
header('Content-Type: application/json');

// get token
$query_token = mysqli_query($sql, "SELECT id FROM ff_api_tokens WHERE token='$token'");
$count_token = mysqli_num_rows($query_token);

if ($count_token > 0) {
  if ($call == "get_account") {
    $username = $_GET['username'];
    $password = $_GET['password'];
    $hash_psswd = md5($password);

    $query = mysqli_query($sql, "SELECT id FROM ff_accounts WHERE username='$username' AND password='$hash_psswd'");
    $count = mysqli_num_rows($query);
    if ($count > 0) {
      $data = array('output' => 'account_exists');
      echo json_encode($data, JSON_PRETTY_PRINT);
    }
    else {
      $data = array('output' => 'account_doesnt_exist');
      echo json_encode($data, JSON_PRETTY_PRINT);
    }
  }
}
else {
  $data = array('output' => 'unknown token');
  echo json_encode($data, JSON_PRETTY_PRINT);
}
?>
