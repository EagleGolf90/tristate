<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addScores();
$golf = null;

$location = SCORES_URL;
// header("Location: " . $location);
// exit;
?>

<h3><a href="<?php echo $location; ?>">Return to Groups</a></h3>
