<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$rows = $golf->getTwoDayLeaderboard();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<div class="container">
  <?php
  $display_message = '<h1>' . $courseInfo[0][1] . '</h1>';
  include(INCLUDES . 'display_message.php');
  
  $display_message = '<h3>' . $courseInfo[0][3] . ', ' . $courseInfo[0][4] . '</h3>';
  include(INCLUDES . 'display_message.php');
  ?>
  <hr/>

  <?php
  $display_message = '<h2>IDGA Two-Day Leaderboard<h2>';
  include(INCLUDES . 'display_message.php');
  ?>

  <div class="row">
    <div class="col-md-2">&nbsp;</div>
    <div class="col header">Place</div>
    <div class="col-md-3 header">Name</div>
    <div class="col text-center header">Rnd 1</div>
    <div class="col text-center header">Rnd 2</div>
    <div class="col text-center header">Total</div>
    <div class="col-md-3">&nbsp;</div>
  </div>

<?php
$place = 0;
$oldScore = 0;
$tied = 0;
foreach ($rows as $row) {
  if ($oldScore != $row['TotalScore']) {
    $place += ($tied + 1);
    $tied = 0;
  } else {
    $tied += 1;
  }
?>
  <div class="row">
    <div class="col-md-2">&nbsp;</div>
    <div class="col text-center"><?php echo $place; ?></div>
    <div class="col-md-3"><?php echo $row['LastName'] . ', ' . $row['FirstName']; ?></div>
    <div class="col text-center"><?php echo $row['R1']; ?></div>
    <div class="col text-center"><?php echo $row['R2']; ?></div>
    <div class="col text-center"><?php echo $row['TotalScore']; ?></div>
    <div class="col-md-3">&nbsp;</div>
  </div>
<?php
  $oldScore = $row['TotalScore'];
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
