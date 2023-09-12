<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$pairings = $golf->getPairings($_GET['roundPlayed']);
$players_row = $golf->displayPairings($_GET['roundPlayed']);

$groupSize = $golf->calculateGroupSize();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="pairings" hidden>
  <input type="number" name="roundPlayed" value="<?php echo $_GET['roundPlayed']; ?>" hidden>
  <input type="number" name="holeNumber" value="1" hidden>

  <div class="container-form">
    <?php
    $display_message = '<h3>Add Pairing</h3>';
    include(INCLUDES . 'display_message.php');
    ?>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="groupID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php
for ($x = 0; $x < $groupSize; $x++) {
  $groupLetter = chr(65+$x);
?>
            <option value="<?php echo $groupLetter; ?>"><?php echo $groupLetter; ?></option>
<?php
}
?>
          </select>
          <label for="group">Group</label>
        </div>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php
foreach ($pairings as $pairing) {
?>
            <option value="<?php echo $pairing['PlayerID']; ?>"><?php echo $pairing['LastName'] . ', ' . $pairing['FirstName'] . ' (' . $pairing['Organization'] . ')'; ?></option>
<?php
}
?>
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>
    <hr/>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
<?php
$count = 0;
$oldGroupID = '';
foreach ($players_row as $display) {
  if ($oldGroupID != $display['GroupID']) {
    $delete_link = 'delete.php?page=pairings&round=' . $roundPlayed . '&group=' . $display['GroupID'];
?>
        <tr class="pairing_header"><td>Group <?php echo $display['GroupID']; ?></td><td style="text-align: right"><a href="<?php echo $delete_link; ?>">Delete</a></td></tr>
<?php
  }
?>
        <tr><td><?php echo $display['Organization']; ?></td><td><?php echo $display['LastName'] . ', ' . $display['FirstName']; ?></td></tr>
<?php
  $oldGroupID = $display['GroupID'];
  $count += 1;
}
?>
        <tr><td colspan="2"><b>Total: <?php echo $count; ?></b></td></tr>
        </table>
      </div>
    </div>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
