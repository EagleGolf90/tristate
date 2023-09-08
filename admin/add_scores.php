<?php
include('../preload.php');

$location = ADMIN_URL . 'groups.php?roundPlayed=' . $_POST['roundPlayed'];

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addScores();
$golf = null;

header("Location: " . $location);
exit;
?>
