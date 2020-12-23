<?php
require("mysql_connect.php");

// Board Settings
$board_query = mysqli_query($sql, "SELECT board_title, board_msg FROM ff_config WHERE id = '1'");
$board_row = mysqli_fetch_assoc($board_query);

$board_title = $board_row['board_title'];
$board_msg = $board_row['board_msg'];
?>
