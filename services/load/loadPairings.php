<?php
include(PAIRINGS_PATH . 'Pairings.class.php');
include(PAIRINGS_PATH . 'PairingService.class.php');

$sqlTable = new SQLTable();
$pairingService = new PairingService($sqlTable);

$pairings = new Pairings($pairingService);
?>
