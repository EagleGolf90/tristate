<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addParticipants();
$golf = null;

$location = SCORES_URL . 'addParticipant.php?roundPlayed=' . $_POST['roundPlayed'];
header("Location: " . $location);
exit;
?>
