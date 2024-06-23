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

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="groupID" class="form-control" required id="groupID">
            <option value="" selected>Select one</option>
<?php foreach ($orgs as $org) { ?>
            <option value="<?php echo $org['FieldValue']; ?>"><?php echo $org['LongName']; ?></option>
<?php } ?>
          </select>
          <label for="group">Organization</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control" required id="playerID">
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="date_entered" id="date_entered">
          <label for="date_entered">Date Entered</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="score" id="score">
          <label for="score">Score</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="course_rating" id="course_rating" required>
          <label for="course_rating">Course Rating</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="slope_rating" id="slope_rating" required>
          <label for="slope_rating">Slope Rating</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <span class="form-control" name="handicap" id="handicap"></span>
          <label for="handicap">Handicap</label>
        </div>
      </div>
    </div>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>

    <?php //include('displayPairings.php'); ?>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
