<?php
if (!isset($_GET['page'])) die('Must have page parameter. Please try again.');

include('../preload.php');

$location = ADMIN_URL;

switch (strtolower($_GET['page'])) {
  case 'contacts':
    include(LOAD_PATH . 'loadContacts.php');
    $contacts->deleteContacts($_GET['id']);
    $location .= 'addContacts.php';
    $contacts = null;
    break;
  case 'participants':
    include(LOAD_PATH . 'loadParticipants.php');
    $participants->deleteParticipants($_GET['id']);
    $location .= 'addParticipants.php';
    $participants = null;
    break;
  case 'pairings':
    include(LOAD_PATH . 'loadPairings.php');
    $pairings->deletePairings($_GET['round'], $_GET['group']);
    $location .= 'addPairings.php?roundPlayed=' . $_GET['round'];
    $pairings = null;
    break;
  case 'skins':
    include(LOAD_PATH . 'loadSkins.php');
    $skins->deleteSkins($_GET['round'], $_GET['id']);
    $location .= 'manageSkins.php';
    $skins = null;
    break;
}

header("Location: " . $location);
exit;
?>
