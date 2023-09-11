<?php
if (!isset($_POST['page'])) die('Must have page parameter. Please try again.');

include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$object = new GolfScores();
$methodName = 'add' . ucwords($_POST['page']);

if (!method_exists($object, $methodName)) {
  die('Something isn\'t working. Please check with Administrator.');
}
$object->$methodName();

$location = ADMIN_URL . $object->getRedirectLink(strtolower($_POST['page']));
header("Location: " . $location);
exit;

$object = null;
?>
