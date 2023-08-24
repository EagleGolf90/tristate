<?php
include('../preload.php');
include('golf_data.php');
include(HTML . 'beginHTML.php');
?>

<div class="container-fluid">
<form id="regForm" action="/action_page.php">
<?php
for ($y = 0; $y < 18; $y++) {
    $holeNumber = ((($y + 1) < 10) ? '0' : '') . ($y+1);
?>
  <div class="tab">
    <h1><?php echo 'Hole ' . ($y+1) . ' - Par ' . $holes[$y][0] . ', Yards ' . $holes[$y][1]; ?></h1>
<?php for ($z = 0; $z < sizeof($players); $z++) {
        //$name_id = 'p_' . $players[$z][0] . '_' . $holeNumber;
        $zeros = '';
        if ($players[$z][2] < 100) $zeros = '0' . $players[$z][2];
        if ($players[$z][2] < 10) $zeros = '00' . $players[$z][2];
        $name_id = 'p_' . $zeros;
?>
    <div class="row">
      <div class="col-5"><label class="name_label"><?php echo $players[$z][1]; ?></label></div>
      <div class="col-2"><input type="number" name="<?php echo $name_id; ?>[]" id="<?php echo $name_id; ?>" class="form-control holes" value=""></div>
      <!-- <div class="col-4"><input type="number" name="scores[<?php //echo $z; ?>][<?php //echo $y; ?>]" class="form-control holes" value=""></div> -->
      <div class="col-2">&nbsp;</div>
      </div>
<?php } ?>
  </div>
<?php
}
?>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>

  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;" hidden>
<?php for ($x = 1; $x <= 18; $x++) { ?>
    <span class="step"></span>
<?php } ?>
  </div>
</form>
</div>

<script type="text/javascript">
function display(id) {
    var input = document.getElementsByName('scores');
    alert(input);
}
</script>

<?php
include(HTML . 'scripts.php');
include(HTML . 'endHTML.php');
?>
