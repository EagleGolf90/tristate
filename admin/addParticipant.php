<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
$participants = $golf->getParticipants();
$players_row = $golf->displayParticipants();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="participant" hidden>
  <div class="container-list">
    <?php
    $display_message = '<h3>Add Participant</h3>';
    include(INCLUDES . 'display_message.php');
    ?>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="playerID" class="form-control">
            <option value="0" selected>Select one</option>
<?php
foreach ($participants as $participant) {
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
        <div class="form-floating mb-3">
          <select name="player_choice" class="form-control">
            <option value="0" selected>Select one</option>
            <option value="1">Tri-State Cup</option>
            <option value="2">IDGA Two Day Tournament</option>
          </select>
          <label for="player_choice">Player's Choice</label>
        </div>
      </div>
    </div>

    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-hover table-bordered">
<?php
$count = 0;
$tristate = 0;
$two_day = 0;
foreach ($players_row as $display) {
  $name_value = $display['LastName'] . ', ' . $display['FirstName'];
  $delete_link = 'delete.php?id=' . $display['PlayerID'];
?>
        <tr>
          <td><?php echo $name_value; ?></td>
          <td><?php echo $display['Organization']; ?></td>
          <td><?php echo $display['PlayerChoice']; ?></td>
          <td><a href="<?php echo $delete_link; ?>">Delete</d></td>
        </tr>
<?php
  if ($display['Event'] == 1) $tristate += 1;
  if ($display['Event'] == 2) $two_day += 1;
  $count += 1;
}
?>
        <tr><td colspan="3"><b>Tri-State Total: <?php echo $tristate; ?></b></td></tr>
        <tr><td colspan="3"><b>Two-Day Total: <?php echo $two_day; ?></b></td></tr>
        <tr><td colspan="3"><b>Total: <?php echo $count; ?></b></td></tr>
        </table>
      </div>
    </div>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
