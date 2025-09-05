<?php
include(SCORES_PATH . 'Scores.class.php');
include(COURSES_PATH . 'CourseService.class.php');
include(PLAYERS_PATH . 'PlayerService.class.php');
include(SCORES_PATH . 'ScoreService.class.php');

$sqlTable = new SQLTable();
$courseService = new CourseService($sqlTable);
$playerService = new PlayerService($sqlTable);
$scoreService = new ScoreService($sqlTable);

$golf = new Scores($courseService, $playerService, $scoreService);
?>
