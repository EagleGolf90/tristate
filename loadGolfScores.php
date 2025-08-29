<?php
include(CONCRETE_PATH . 'GolfScores.class.php');
include(CONCRETE_PATH . 'CourseService.class.php');
include(CONCRETE_PATH . 'PlayerService.class.php');
include(CONCRETE_PATH . 'ScoreService.class.php');

$sqlTable = new SQLTable();
$courseService = new CourseService($sqlTable);
$playerService = new PlayerService($sqlTable);
$scoreService = new ScoreService($sqlTable);

$golf = new GolfScores($courseService, $playerService, $scoreService);
?>