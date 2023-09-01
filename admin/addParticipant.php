<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$participants = $golf->getParticipants($_GET['roundPlayed']);
$players_row = $golf->displayParticipants($_GET['roundPlayed']);

include(HTML . 'beginHTML.php');
?>

<form class="regForm" action="add_participant.php" method="post">
  <input type="number" name="roundPlayed" value="<?php echo $_GET['roundPlayed']; ?>" hidden>
  <div class="container-form">
    <?php include(MENUS . 'return_menu.php'); ?>

    <div class="row">
      <div class="col-md-12 text-center">
        <h3>Add Participant</h3>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control">
            <option value="0" selected>Select one</option>
<?php
foreach ($participants as $participant) {
?>
            <option value="<?php echo $participant['PlayerID']; ?>"><?php echo $participant['LastName'] . ', ' . $participant['FirstName'] . ' (' . $participant['Organization'] . ')'; ?></option>
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
      <div class="col-md-12">
        <table class="table table-bordered">
<?php
$count = 0;
foreach ($players_row as $display) {
?>
        <tr><td><?php echo $display['LastName'] . ', ' . $display['FirstName'] . ' (' . $display['Organization'] . ')'; ?></td></tr>
<?php
  $count += 1;
}
?>
        <tr><td><b>Total: <?php echo $count; ?></b></td></tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </div>
    </div>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
