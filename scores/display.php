<?php
$players = $_POST['player'];
foreach ($players as $key => $value) {
  echo "Player ID: " . $value . "<br>";

  $player_id = '';
  if ($value < 100) $player_id = '0' . $value;
  if ($value < 10) $player_id = '00' . $value;

  $score_id = $_POST['scores' . $player_id];
  $all_scores = '';
  $totals = 0;

  foreach ($score_id as $key => $value) {
    if ($all_scores != '') $all_scores .= ', ';
    $all_scores .= $value;
    $totals += $value;
  }
  echo 'Scores: ' . $all_scores . '<br/>Total: ' . $totals . '<br/>';
}
?>
