<?php
include('../preload.php');

include(LOAD_PATH . 'loadScores.php');
include(LOAD_PATH . 'loadHoleDetails.php');
include(CONCRETE_PATH . 'ScoresPresenter.class.php');
$presenter = new ScoresPresenter();

$holes = $holedetails->getHoleDetailsByRound();
$roundPlayed = $golf->getCurrentRound();

$handicapTableCell = $holedetails->getHoleHandicaps();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<div class="container-fluid">
  <?php echo $presenter->formatTitle('Tri-State All Scores'); ?>

  <div class="row">
    <table class="table table-dark table-striped table-hover">
    <tr class="table-primary">
      <td class="text-center">Hole</td>
<?php for ($x = 1; $x <= 18; $x++) {
        if ($x == 10) echo '<td class="text-center">OUT</td>' . "\n";
?>
      <td class="text-center"><?php echo $x; ?></td>
<?php } ?>
      <td class="text-center">IN</td>
      <td class="text-center">TOT</td>
    </tr>

    <tr class="table-success">
      <td class="text-center">Par</td>
<?php $front9 = 0;
      $back9 = 0;
      foreach ($holes as $hole) {
        $par = $hole['Par'];
        if ($hole['HoleNumber'] <= 9) $front9 += $par;
        if ($hole['HoleNumber'] > 9) $back9 += $par;
        if ($hole['HoleNumber'] == 10) echo '<td class="text-center">' . $front9 . '</td>' . "\n";
?>
      <td class="scores"><?php echo $hole['Par']; ?></td>
<?php } ?>
      <td class="text-center"><?php echo $back9; ?></td>
      <td class="text-center"><?php echo ($front9 + $back9); ?></td>
    </tr>

    <tr class="table-secondary">
      <td class="text-center">HCP</td>
      <?php echo $handicapTableCell; ?>
    </tr>

<?php
foreach ($golf->getScoresByRound($roundPlayed) as $row) {
?>
    <tr>
      <td class="scores"><?php echo $row['LastName'] . ', ' . $row['FirstName']; ?></td>
<?php
  $front9 = $row['Front9'];
  $back9 = $row['Back9'];
  for ($x = 1; $x <= 18; $x++) {
    $fieldName = 'Score' . strval($x);
    if ($x == 10) echo '<td class="scores">' . $front9 . '</td>' . "\n";
?>
      <td class="scores"><?php echo $row[$fieldName]; ?></td>
<?php
  }
?>
      <td class="scores"><?php echo $back9; ?></td>
      <td class="scores"><?php echo ($front9 + $back9); ?></td>
    </tr>
<?php
}
?>
    </table>
  </div>
</div>

<?php include(HTML . 'endHTML.php'); ?>
