<?php
$name_url = $_SERVER['PHP_SELF'];
$file_name = str_replace(DS . 'tristate' . DS, "", $name_url);

switch ($file_name) {
  case 'menus/index.php':
    include(HTML . 'head_menus.php');
    break;
  case 'handicap/enterHandicaps.php':
    include(HTML . 'head_handicaps.php');
    break;
  default:
    include(HTML . 'head_scores.php');
    break;
}
?>
