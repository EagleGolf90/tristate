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

switch (PAGE_NAME) {
  case PAGE_NAME == 'leaderboard.php':
    $players = $golf->getPlayers();
    break;
  case 'index.php':
    $players = $golf->getPlayers();
    break;
  case 'enterScores.php':
    $players = $golf->getGroups($_GET['round'], $_GET['group']);
    break;
}
?>
