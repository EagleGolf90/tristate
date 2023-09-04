<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$rows = $golf->getLeaderboard();
$teams = $golf->getTeamScores();
$final_cut = $golf->getFinalCut();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<div class="container">
  <?php
  $display_message = '<h1>' . $courseInfo[0][1] . '</h1>';
  include(INCLUDES . 'display_message.php');

  $display_message = '<h2>' . $date_played . '</h2>';
  include(INCLUDES . 'display_message.php');

  $display_message = '<h3>' . $courseInfo[0][3] . ', ' . $courseInfo[0][4] . '</h3>';
  include(INCLUDES . 'display_message.php');
  ?>
  <hr/>

  <?php include('team_score.php'); ?>

  <div class="row">
<?php
$oldOrganization = '';
$x = 0;
$team_cut = 0;
foreach ($rows as $row) {
  if ($row['TotalScore'] > 0 && $team_cut == $final_cut) echo '<hr/>' . "\n";
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
