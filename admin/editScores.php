<?php
include('../preload.php');
include(CLASSES . 'edit_scores.class.php');
$golf = new EditScores();
$players = $golf->getPlayers($_GET['roundPlayed']);

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form class="regForm" action="add.php" method="post">
<div class="container">
  <input type="text" name="page" value="edit_scores" hidden>
  <input type="text" name="roundPlayed" value="<?php echo $roundPlayed; ?>" hidden>
  <input type="text" name="roundID" value="<?php echo $roundID; ?>" hidden>

  <?php
  $display_message = '<h2>Edit Scores</h2>';
  include(INCLUDES . 'display_message.php');
  ?>

  <div class="row">
    <div class="col-md-12">
<?php foreach ($players as $player) { ?>
      <h4><?php echo $player['LastName'] . ', ' . $player['FirstName'] . "\n"; ?></h4>
<?php } ?>
    </div>
  </div>

  <?php include(INCLUDES . 'submit_button.php'); ?>
</div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
