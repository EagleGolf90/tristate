<?php
$name_url = $_SERVER['PHP_SELF'];
$file_name = str_replace(DS . 'tristate' . DS, "", $name_url);

switch ($file_name) {
  case 'menus/index.php':
    include(HTML . 'head_menus.php');
    break;
  case 'admin/index.php':
    include(HTML . 'head_admin.php');
    break;
  case 'scores/index.php':
  case 'scores/test1.php':
  case 'scores/enterScores.php':
  case 'scores/enterScores_mobile.php':
  case 'scores/leaderboard.php':
  case 'scores/two_day.php':
    include(HTML . 'head_scores.php');
    break;
}
?>
