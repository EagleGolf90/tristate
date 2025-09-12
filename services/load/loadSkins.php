<?php
include(SKINS_PATH . 'Skins.class.php');
include(SKINS_PATH . 'SkinsService.class.php');

$sqlTable = new SQLTable();
$skinsService = new SkinsService($sqlTable);

$skins = new Skins($skinsService);
?>
