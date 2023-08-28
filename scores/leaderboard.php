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
    <div class="col-md-4 text-center">
      <h2>Indiana</h2>
    </div>
    <div class="col-md-4 text-center">
      <h2>Kentucky</h2>
    </div>
    <div class="col-md-4 text-center">
      <h2>Ohio</h2>
    </div>
  </div>

  <div class="row">
<?php
$rows = $golf->getLeaderboard();
$oldOrganization = '';
$x = 0;
foreach ($rows as $row) {
  if ($oldOrganization != $row['Organization']) {
    if ($x > 0) {
?>
    </div>
<?php
    }
?>
    <div class="col-md-4 text-center">
<?php
  }
  echo $row['LastName'] . ', ' . $row['FirstName'] . ($row['TotalScore'] == '' ? '' : ' (' . $row['TotalScore'] . ')');
  echo '<br/>' . "\n";
  $oldOrganization = $row['Organization'];
  $x++;
}
?>
  </div>

</div>

<?php include(HTML . 'endHTML.php'); ?>
