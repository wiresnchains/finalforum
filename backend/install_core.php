<?php
function createTables($board_nametitle, $board_message, $mysql_host, $admin_username, $admin_password) {
  require_once('mysql_connect.php');
  
  // import sql
  $filename = 'tables.sql';
  // Temporary variable, used to store current query
  $templine = '';
  // Read in entire file
  $lines = file($filename);
  // Loop through each line
  foreach ($lines as $line)
  {
  // Skip it if it's a comment
  if (substr($line, 0, 2) == '--' || $line == '')
      continue;
  // Add this line to the current segment
  $templine .= $line;
  // If it has a semicolon at the end, it's the end of the query
  if (substr(trim($line), -1, 1) == ';')
  {
    // Perform the query
    mysqli_query($sql, $templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
  }
  }
  mysqli_query($sql, "UPDATE ff_config SET board_title='$board_nametitle', board_msg='$board_message' WHERE id='1'");
  $hash_psswd = md5($admin_password);
  $regdate = date("d-m-y");
  mysqli_query($sql, "INSERT INTO ff_accounts (username, password, reg_date) VALUES ('$admin_username', '$hash_psswd', '$regdate')");
  mysqli_query($sql, "INSERT INTO ff_admins (username, password) VALUES ('$admin_username', '$hash_psswd')");

  // token
  $length = 20;
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $token = '';
  for ($i = 0; $i < $length; $i++) {
      $token .= $characters[rand(0, $charactersLength - 1)];
  }

  mysqli_query($sql, "INSERT INTO ff_api_tokens (token) VALUES ('$token')");

  echo "<br><h4>Tables imported successfully</h4><br><a href='/'>Home Page</a>";
}
function continueinstallation($board_nametitle, $board_message, $board_locale, $mysql_host, $mysql_username, $mysql_password, $mysql_database, $admin_username, $admin_password) {
  if ($board_title = "" || $board_message == "" || $mysql_host  == "" || $mysql_username == "" || $mysql_password == "" || $mysql_database == "" || $admin_username == "" | $admin_password == "") {
    echo "<br><p>Form cannot be empty!</p>";
  }
  else {
    $filename = "mysql_connect.php";
    $FileHandle = fopen($filename, 'w');

    $container = "<?php
\$host = \"" . $mysql_host . "\";
\$name = \"" . $mysql_username . "\";
\$pass = \"" . $mysql_password . "\";
\$db = \"" . $mysql_database . "\";
\$sql = mysqli_connect(\$host, \$name, \$pass, \$db);
?>";
    fwrite($FileHandle, $container);
    fclose($FileHandle);
    echo "<br><h4>Mysql config file created</h4>";

    // lang
    $filename1 = "langs/config.php";
    $FileHandle1 = fopen($filename1, 'w');
    $container1 = "<?php
require(\"" . $board_locale . ".php\");
?>";
    fwrite($FileHandle1, $container1);
    fclose($FileHandle1);

    createTables($board_nametitle, $board_message, $mysql_host, $admin_username, $admin_password);
  }
}
?>
