<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$skins = $golf->checkSkins($roundPlayed);

include(HTML . 'beginHTML.php');
?>

<div class="container">
  <?php include(MENUS . 'return_menu.php'); ?>
  <div class="row">
    <div class="col-md-12 text-center">
      <h1><?php echo $courseInfo[0][1]; ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h2><?php echo $date_played; ?></h2>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 text-center">
      <h3><?php echo $courseInfo[0][3] . ', ' . $courseInfo[0][4]; ?></h3>
    </div>
  </div>
  <hr/>

<?php
$oldHoleNumber = 0;
foreach ($skins as $skin) {
  $fullName = $skin['LastName'] . ', ' . $skin['FirstName'];
  if ($oldHoleNumber != $skin['HoleNumber']) {
?>
   <div class="row">
     <div class="col-md-2">&nbsp;</div>
     <div class="col-md-6 text-center"><h2>Hole <?php echo ($oldHoleNumber+1); ?></h2></div>
     <div class="col-md-4">&nbsp;</div>
   </div>
<?php
  }
?>
  <div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-3"><?php echo $fullName; ?></div>
    <div class="col-md-3"><?php echo $skin['Stroke']; ?></div>
    <div class="col-md-3">&nbsp;</div>
  </div>
<?php
  $oldHoleNumber = $skin['HoleNumber'];
}
?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
