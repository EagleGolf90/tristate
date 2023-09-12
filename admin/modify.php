<?php
if (!isset($_POST['page'])) die('Must have page parameter. Please try again.');

include('../preload.php');
include(INCLUDES . 'initialize_golf.php');

$location = ADMIN_URL;
switch (strtolower($_POST['page'])) {
  case 'modifysetup':
    echo BUS_UNIT . '<br/>';
    $golf->modifySetup();
    $location .= 'manageSetup.php';
    break;
}
$golf = null;

header("Location: " . $location);
exit;
?>
