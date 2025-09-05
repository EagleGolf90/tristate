<?php
include(COURSES_PATH . 'Courses.class.php');
include(COURSES_PATH . 'CourseService.class.php');

$sqlTable = new SQLTable();
$courseService = new CourseService($sqlTable);

$courses = new Courses($courseService);
?>
