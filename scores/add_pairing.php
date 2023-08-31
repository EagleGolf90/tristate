<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addPairings();
$golf = null;

$location = SCORES_URL . 'addPairing.php?roundPlayed=' . $_POST['roundPlayed'];
header("Location: " . $location);
exit;
?>
