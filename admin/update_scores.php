<?php
include('../preload.php');

$location = ADMIN_URL . 'groups.php?roundPlayed=' . $_POST['roundPlayed']; ?>
<h2><a href="<?php echo $location; ?>">Back to Groups</a></h2>

<?php
include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();
$golf->addScores();
$golf = null;
?>
