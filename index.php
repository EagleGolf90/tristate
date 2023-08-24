<?php
include('preload.php');
$location = SCORES_URL . '?bu=' . strtolower(BUS_UNIT);
header("Location: " . $location);
exit;
?>
