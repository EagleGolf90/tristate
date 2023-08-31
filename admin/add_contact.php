<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addNames();
$golf = null;

$location = TRISTATE_URL;
header("Location: " . $location);
exit;
?>
