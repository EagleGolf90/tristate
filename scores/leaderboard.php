<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$rows = $golf->getLeaderboard();
$teams = $golf->getTeamScores();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<div class="container">
  <?php include(INCLUDES . 'course_header.php'); ?>
  <hr/>

  <?php include('team_score.php'); ?>

  <div class="row">
<?php
$oldOrganization = '';
$x = 0;
$team_cut = 0;
foreach ($rows as $row) {
  if ($golf->isTeamFinalCut($team_cut)) echo $golf->separator();

  if ($oldOrganization != $row['Organization']) {
    $team_cut = 0;
    if ($golf->isSecondRowOrMore($x)) {
?>
    </div>
<?php
    }
?>
    <div class="col-md-4 text-center">
<?php
  }
  echo $golf->printGolferName($row);
  $oldOrganization = $row['Organization'];
  $x++;
  $team_cut++;
}
?>
  </div>

</div>

<?php include(HTML . 'endHTML.php'); ?>
