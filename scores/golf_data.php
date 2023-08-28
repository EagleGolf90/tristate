<?php
include(CLASSES . 'golf_scores.class.php');
$golf = new GolfScores();

$courseInfo = $golf->getCourseInfo();
$holes = $golf->getCourseDetails();
$roundPlayed = $golf->getRoundPlayed();
$roundID = $golf->getRoundID();

$allpars = '';
for ($idx = 0; $idx < sizeof($holes); $idx++) {
  if ($allpars != '') $allpars .= ',';
  $allpars .= $holes[$idx][0];
}

$course_name = $courseInfo[0][1];
$temp_date_played = date_create($courseInfo[0][2]);
$date_played = date_format($temp_date_played, "l, F d, Y");
$location = $courseInfo[0][3] . ', ' . $courseInfo[0][4];

if (PAGE_NAME == 'index.php') {
  $players = $golf->getPlayers();
} else {
  $players = $golf->getGroups($roundPlayed, $_GET['group']);
}
?>
