<?php
if (!isset($_GET['page'])) die('Must have page parameter. Please try again.');

include('../preload.php');
include(INCLUDES . 'initialize_golf.php');

$script_file = TRISTATE_URL . $_GET['page'];

include(HTML . 'beginHTML.php');
?>

<form method="get" action="<?php echo $script_file; ?>" name="skinsForm">
<div class="container">
  <?php
  include(MENUS . 'return_menu.php');
  $page_title = 'Tri-State Cup 2023';
  include(INCLUDES . 'page_title.php');
  ?>
  <hr/>

  <div class="row">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-2">Which Date?</div>
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

  <?php include(INCLUDES . 'submit_button.php'); ?>
</div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
