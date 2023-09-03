  <div class="row">
<?php foreach ($teams as $team) { ?>
    <div class="col-md-4 text-center">
      <h2><?php echo $team['Organization'] . (empty($team['TeamScore']) ? '' : ' (' . $team['TeamScore'] . ')'); ?></h2>
    </div>
<?php } ?>
  </div>
