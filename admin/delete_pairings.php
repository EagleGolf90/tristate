<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->deletePairings($_GET['round'], $_GET['group']);
$golf = null;

$location = ADMIN_URL . 'addPairing.php?roundPlayed=' . $_GET['round'];
header("Location: " . $location);
exit;
?>
