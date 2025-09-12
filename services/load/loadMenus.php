<?php
include(MENUS_PATH . 'Menus.class.php');
include(MENUS_PATH . 'MenuService.class.php');

$sqlTable = new SQLTable();
$menuService = new MenuService($sqlTable);

$menus = new Menus($menuService);
?>
