<?php
include('../res_screen.php');

$redirect_link = 'http://kdga.org/tristate/scores/';
if ($screenType == 'Mobile') {
  $redirect_link .= 'enterScores.php';
} else {
  $redirect_link .= 'enterScores_desktop.php';
}
$redirect_link .= '?group=' . $_GET['group'];

header("Location: " . $redirect_link);
exit;
?>
