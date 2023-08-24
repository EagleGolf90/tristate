<?php
$name_url = $_SERVER['PHP_SELF'];
$file_name = str_replace(DS . 'tristate' . DS, "", $name_url);

switch ($file_name) {
  case 'admin/index.php':
    include(HTML . 'head_admin.php');
    break;
  case 'scores/index.php':
  case 'scores/test1.php':
  case 'scores/enterScores.php':
    include(HTML . 'head_scores.php');
    break;
}
?>
