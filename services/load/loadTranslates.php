<?php
include(TRANSLATES_PATH . 'Translate.class.php');
include(TRANSLATES_PATH . 'TranslateService.class.php');

$sqlTable = new SQLTable();
$translateService = new TranslateService($sqlTable);

$translate = new Translate($translateService);
?>
