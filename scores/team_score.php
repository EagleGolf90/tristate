  <div class="row">
<?php
$scores_flag = false;
for ($x = 0; $x < 4; $x++) {
  $team_score = $teams[$x][2];
  if (!empty($team_score)) $scores_flag = true;
?>
    <div class="col-md-4 text-center">
      <h2><?php echo $teams[$x][1] . (empty($team_score) ? '' : ' (' . $team_score . ')'); ?></h2>
    </div>
<?php
}
?>
  </div>
