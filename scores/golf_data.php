<?php
include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();

$courseInfo = $golf->getCourseInfo();
$holes = $golf->getCourseDetails();

$course_name = $courseInfo[0][1];
$temp_date_played = date_create($courseInfo[0][2]);
$date_played = date_format($temp_date_played, "l, F d, Y");
$location = $courseInfo[0][3] . ', ' . $courseInfo[0][4];

if (PAGE_NAME == 'index.php') {
  $players = $golf->getPlayers();
} else {
  $players = $golf->getGroups($_GET['group']);
}
?>
