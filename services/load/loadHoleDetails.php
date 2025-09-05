<?php
include(HOLEDETAILS_PATH . 'HoleDetails.class.php');
include(HOLEDETAILS_PATH . 'HoleDetailsService.class.php');

$sqlTable = new SQLTable();
$holeDetailsService = new HoleDetailsService($sqlTable);

$holedetails = new HoleDetails($holeDetailsService);
?>
