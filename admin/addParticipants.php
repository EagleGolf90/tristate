<?php
include('../preload.php');

include(LOAD_PATH . 'loadParticipants.php');
include(CONCRETE_PATH . 'Presenter.class.php');
$presenter = new Presenter();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="participants" hidden>
  <input type="number" name="roundPlayed" value="<?php echo $participants->getRoundPlayed(); ?>" hidden>
  <div class="container-list">
    <?php $presenter->formatHtmlString('<h3>Add Participant</h3>'); ?>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php
foreach ($participants->getParticipants() as $participant) {
  $name_value = $participant['LastName'] . ', ' . $participant['FirstName'] . ' (' . $participant['Organization'] . ')';
?>
            <option value="<?php echo $participant['PlayerID']; ?>"><?php echo $name_value; ?></option>
<?php
}
?>
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-floating mb-3" required>
          <select name="player_choice" class="form-control">
            <option value="" selected>Select one</option>
            <option value="1">Tri-State Cup</option>
            <option value="2">IDGA Two Day Tournament</option>
          </select>
          <label for="player_choice">Player's Choice</label>
        </div>
      </div>
    </div>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>

    <?php include('displayParticipants.php'); ?>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
