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
  if (substr($_GET['page'],0,5) == 'admin') {
    include(MENUS . 'areturn_menu.php');
  } else {
    include(MENUS . 'return_menu.php');
  }
  ?>
  <div class="row">
    <div class="col-md-12 text-center">
      <h1>Tri-State Cup 2023</h1>
    </div>
  </div>
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

  <div class="row">
      <div class="col-sm-12 text-center">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
      </div>
   </div>
</div>
</form>

<?php include(HTML . 'endHTML.php'); ?>
