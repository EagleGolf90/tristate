<?php
include('../preload.php');
include(CLASSES . 'edit_scores.class.php');
$edit = new EditScores();
$participants = $edit->loadParticipants();
$orgs = $edit->loadOrganization();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="handicaps" hidden>

  <div class="container-form">
    <?php
    $display_message = '<h3>Enter Handicaps</h3>';
    include(INCLUDES . 'display_message.php');
    ?>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="groupID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php foreach ($orgs as $org) { ?>
            <option value="<?php echo $org['FieldValue']; ?>"><?php echo $org['LongName']; ?></option>
<?php } ?>
          </select>
          <label for="group">Organization</label>
        </div>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php
foreach ($participants as $participant) {
?>
            <option value="<?php echo $participant['PlayerID']; ?>"><?php echo $participant['LastName'] . ', ' . $participant['FirstName']; ?></option>
<?php
}
?>
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="date_entered" id="date_entered">
          <label for="date_entered">Date Entered</label>
        </div>
      </div>
    </div>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>

    <?php include('displayPairings.php'); ?>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
