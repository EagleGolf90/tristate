<?php
include('preload.php');
$location = SQUARES_URL . strtolower(SQUARES) . '/?bu=' . strtolower(BUS_UNIT);
header("Location: " . $location);
exit;
?>
