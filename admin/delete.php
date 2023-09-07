<?php
if (!isset($_GET['page'])) {
  die('Must have page parameter. Please try again.');
}

include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->deletePairings($_GET['round'], $_GET['group']);

$location = ADMIN_URL;
switch (strtolower($_GET['page'])) {
  case 'participant':
    $golf->deleteParticipant($_GET['id']);
    $location .= 'addParticipant.php';
    break;
  case 'pairing':
    $golf->deletePairings($_GET['round'], $_GET['group']);
    $location .= 'addPairing.php?roundPlayed=' . $_GET['round'];
    break;
}
$golf = null;

header("Location: " . $location);
exit;
?>
