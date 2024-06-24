<?php
include('../preload.php');

include(CLASSES . 'handicaps.class.php');

$handicap = new Handicap();
$flag = $handicap->AddHandicap();
$handicap = null;

if ($flag == 'Y') {
  header("Location: https://kdga.org/tristate/handicap/enterHandicaps.php");
  exit;
} else {
  echo 'Handicap has been entered. Please try again.';
}
?>
