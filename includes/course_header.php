<?php
$course_name_flag = false;
$date_played_flag = true;
$location_flag = false;
$courseInfo = $courses->getCourseInfo();

if (PAGE_NAME == 'leaderboard.php' || PAGE_NAME == 'net_scores.php') {
  $course_name_flag = true;
  $location_flag = true;
  if (PAGE_NAME == 'net_scores.php') $date_played_flag = false;
}
?>
  <div class="row">
    <div class="col-md-12 text-center">
<?php
foreach ($courses->getCourseInfo() as $courseInfo) {
  if ($course_name_flag == true) echo $presenter->formatCourseName($courseInfo['CourseName']);
  if ($date_played_flag == true) echo $presenter->formatDatePlayed($courseInfo['DatePlayed']);
  if ($location_flag == true) echo $presenter->formatCityState($courseInfo['City'] . ', ' . $courseInfo['State']);
}
?>
    </div>
  </div>
