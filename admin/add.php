<?php
if (!isset($_POST['page'])) {
  die('Must have page parameter. Please try again.');
}

include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();

$location = ADMIN_URL;
switch (strtolower($_POST['page'])) {
  case 'scores':
    $golf->addScores();
    $location .= 'groups.php?roundPlayed=' . $_POST['roundPlayed'];
    break;
  case 'skins':
    $golf->addSkins();
    $location .= 'manageSkins.php';
    break;
  case 'contact':
    $golf->addNames();
    $location .= 'addContacts.php';
    break;
  case 'participant':
    $golf->addParticipants();
    $location .= 'addParticipant.php?roundPlayed=' . $_POST['roundPlayed'];
    break;
  case 'pairing':
    $golf->addPairings();
    $location .= 'addPairing.php?roundPlayed=' . $_POST['roundPlayed'];
    break;
}
$golf = null;

echo $location . '<br/>';
header("Location: " . $location);
exit;
?>
