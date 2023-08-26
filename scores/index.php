<?php
include('../preload.php');
include('golf_data.php');
include(HTML . 'beginHTML.php');
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <h1><?php echo $courseInfo[0][1]; ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h2><?php echo $date_played; ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h3><?php echo $courseInfo[0][3] . ', ' . $courseInfo[0][4]; ?></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h4>Course Rating: <?php echo $courseInfo[0][5]; ?></h4>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h4>Slope Rating: <?php echo $courseInfo[0][6]; ?></h4>
    </div>
  </div>
  <hr/>

<?php
$oldCourseID = '';
for ($x = 0; $x < sizeof($players); $x++) {
  if ($oldCourseID != $players[$x][0]) {
    if ($x > 0) {
      $url_link = '<a href="enterScores_desktop.php?group=' . $oldCourseID . '">' . $groupPlayers . '</a>';
?>
  <div class="row">
    <div class="col-md-2">&nbsp;</div>
    <div class="col-md-2 text-right">Group <?php echo $oldCourseID; ?></div>
    <div class="col-md-6"><?php echo $url_link; ?></div>
    <div class="col-md-2">&nbsp;</div>
  </div>
<?php
      $groupPlayers = '';
    }
  }
  if ($groupPlayers != '') $groupPlayers .= ', ';
  $groupPlayers .= $players[$x][1];
  $oldCourseID = $players[$x][0];
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
