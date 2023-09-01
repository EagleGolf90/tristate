<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addNames();
$golf = null;

$location = ADMIN_URL  . 'addContacts.php';
header("Location: " . $location);
exit;
?>
