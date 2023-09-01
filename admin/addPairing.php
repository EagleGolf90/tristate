<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$pairings = $golf->getPairings($_GET['roundPlayed']);
$players_row = $golf->displayPairings($_GET['roundPlayed']);

include(HTML . 'beginHTML.php');
?>

<form class="regForm" action="add_pairing.php" method="post">
  <input type="number" name="roundPlayed" value="<?php echo $_GET['roundPlayed']; ?>" hidden>
  <input type="number" name="holeNumber" value="1" hidden>

  <div class="container-form">
    <?php include(MENUS . 'return_menu.php'); ?>

    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Add Pairing</h3>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" name="group" class="form-control" id="floatingInput">
          <label for="group">Group</label>
        </div>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control">
            <option value="0" selected>Select one</option>
<?php
foreach ($pairings as $pairing) {
?>
            <option value="<?php echo $pairing['PlayerID']; ?>"><?php echo $pairing['LastName'] . ', ' . $pairing['FirstName']; ?></option>
<?php
}
?>
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-md-12 text-center">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
<?php
$count = 0;
foreach ($players_row as $display) {
?>
        <tr><td>Group <?php echo $display['GroupID']; ?></td><td><?php echo $display['LastName'] . ', ' . $display['FirstName']; ?></td></tr>
<?php
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
