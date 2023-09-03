<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$rows = $golf->getLeaderboard();
$teams = $golf->getTeamScores();

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <?php include(MENUS . 'return_menu.php'); ?>

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

  <?php include('team_score.php'); ?>

  <div class="row">
<?php
$oldOrganization = '';
$x = 0;
$team_cut = 0;
foreach ($rows as $row) {
  if ($team_cut == 4) echo '<hr/>' . "\n";
  if ($oldOrganization != $row['Organization']) {
    $team_cut = 0;
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
  $team_cut++;
}
?>
  </div>

</div>

<?php include(HTML . 'endHTML.php'); ?>
