<?php
if (!isset($_GET['page'])) die('Must have page parameter. Please try again.');

include('../preload.php');
include(INCLUDES . 'initialize_golf.php');

$script_file = TRISTATE_URL . $_GET['page'];

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<form method="get" action="<?php echo $script_file; ?>" name="skinsForm">
<div class="container">
  <?php
  $display_message = '<h1>Tri-State Cup 2023</h1>';
  include(INCLUDES . 'display_message.php');
  ?>
  <hr/>

  <div class="row">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-2">Date Played</div>
    <div class="col-md-2">
      <select name="roundPlayed" class="form-select">
      <?php
      foreach ($rounds as $row) {
?>
        <option value="<?php echo $row['RoundPlayed']; ?>"><?php echo $row['DatePlayed']; ?></option>
<?php
      }
?>
      </select>
    </div>
    <div class="col-md-4">&nbsp;</div>
  </div>

<?php if ($_GET['page'] == 'admin/skins.php') { ?>
  <div class="row">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-2">Division</div>
    <div class="col-md-2">
      <select name="division" class="form-select">
        <option value="4">All</option>
        <option value="1">Open</option>
        <option value="2">Seniors</option>
        <option value="3">Super Seniors</option>
      </select>
    </div>
    <div class="col-md-4">&nbsp;</div>
  </div>
<?php } ?>

  <?php include(INCLUDES . 'submit_button.php'); ?>
</div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
