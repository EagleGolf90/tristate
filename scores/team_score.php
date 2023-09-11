  <div class="row">
<?php for ($x = 0; $x < 4; $x++) { ?>
    <div class="col-md-4 text-center">
      <h2><?php echo $teams[$x][1] . (empty($teams[$x][2]) ? '' : ' (' . $teams[$x][2] . ')'); ?></h2>
    </div>
<?php } ?>
  </div>
