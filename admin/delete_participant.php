<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->deleteParticipant($_GET['id']);
$golf = null;

$location = ADMIN_URL . 'addParticipant.php';
header("Location: " . $location);
exit;
?>
