<?php
$oldHoleNumber = 0;
foreach ($skins as $skin) {
  $fullName = $skin['LastName'] . ', ' . $skin['FirstName'];
  if ($oldHoleNumber != $skin['HoleNumber']) {
?>
   <div class="row">
     <div class="col-md-2">&nbsp;</div>
     <div class="col-md-6 text-center"><h2>Hole <?php echo $skin['HoleNumber']; ?></h2></div>
     <div class="col-md-4">&nbsp;</div>
   </div>
<?php
  }
?>
  <div class="row">
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-3"><?php echo $fullName; ?></div>
    <div class="col-md-3">
      <?php echo '<span class="' . $skin['tag_name'] . '">' . $skin['Stroke'] . '</span>'; ?>
    </div>
    <div class="col-md-3">&nbsp;</div>
  </div>
<?php
  $oldHoleNumber = $skin['HoleNumber'];
}
?>
