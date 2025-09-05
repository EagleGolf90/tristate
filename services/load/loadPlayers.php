<?php
include(PLAYERS_PATH . 'Players.class.php');
include(PLAYERS_PATH . 'PlayerService.class.php');

$sqlTable = new SQLTable();
$playerService = new PlayerService($sqlTable);

$players = new Players($playerService);
?>
