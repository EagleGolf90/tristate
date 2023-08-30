<?php
include('../preload.php');

include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addNames();
$golf = null;
?>

<h3><a href="<?php echo TRISTATE_URL; ?>">Return to Groups</a></h3>
