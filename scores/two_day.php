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
  <hr/>

  <div class="row">
    <div class="col-md-12 text-center">
      <h2>IDGA Two-Day Leaderboard</h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">&nbsp;</div>
    <div class="col">Place</div>
    <div class="col-md-3 header">Name</div>
    <div class="col text-center header">Round 1</div>
    <div class="col text-center header">Round 2</div>
    <div class="col text-center header">Total</div>
    <div class="col-md-3">&nbsp;</div>
  </div>

<?php
$rows = $golf->getTwoDayLeaderboard();
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
