<?php
include('../preload.php');
include(INCLUDES . 'golf_scores.class.php');

include(HTML . 'beginHTML.php');
?>

<form id="regForm" method="post" action="update_scores.php">
  <div class="container">
    <h2 class="header">Enter Scores</h2>
<?php
$s = new GolfScores('Group');
$total = $s->GetTotalCount()-1;

for ($x = 0; $x <= $total; $x++) {
  $names = $s->GetGroupLists($x);
?>
      <div class="row">
        <h4>
        <?php echo 'Group ' . ($x+1) . ': <a href="enter_scores.php?group=' . ($x+1) . '">' . $names . '</a><br/>'; ?>
        </h4>
      </div>
<?php
}
?>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
