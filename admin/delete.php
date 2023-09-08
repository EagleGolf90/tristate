<?php
if (!isset($_GET['page'])) {
  die('Must have page parameter. Please try again.');
}

include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();

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
  case 'skins':
    $golf->deleteSkinsParticipants($_GET['round'], $_GET['id']);
    $location .= 'manageSkins.php';
    break;
}
$golf = null;

header("Location: " . $location);
exit;
?>
