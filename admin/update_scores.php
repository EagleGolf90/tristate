<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addScores();
$golf = null;

$location = ADMIN_URL . 'groups.php?roundPlayed=' . $_POST['roundPlayed'];
header("Location: " . $location);
exit;
?>
