<?php
include('../preload.php');

include(LOAD_PATH . 'loadPairings.php');
include(CONCRETE_PATH . 'ScoresPresenter.class.php');
$presenter = new ScoresPresenter();

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
  <input type="text" name="page" value="pairings" hidden>
  <input type="number" name="roundPlayed" value="<?php echo $_GET['roundPlayed']; ?>" hidden>
  <input type="number" name="holeNumber" value="1" hidden>

  <div class="container-form">
    <?php echo $presenter->formatTitle('Add Pairing<br/>' . $date_played); ?>

    <div row="row">
      <div class="col-md-12">
        <div class="form-floating mb-3">
          <select name="groupID" class="form-control" required>
            <option value="" selected>Select one</option>
<?php
for ($x = 0; $x < $pairings->calculateGroupSize(); $x++) {
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
foreach ($pairings->getPairings($_GET['roundPlayed']) as $pairing) {
?>
            <option value="<?php echo $pairing['PlayerID']; ?>"><?php echo $presenter->formatNameOrg($pairing); ?></option>
<?php
}
?>
          </select>
          <label for="playerID">Name</label>
        </div>
      </div>
    </div>
    <?php include(INCLUDES . 'submit_button.php'); ?>

    <hr/>

    <?php include('displayPairings.php'); ?>
  </div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
