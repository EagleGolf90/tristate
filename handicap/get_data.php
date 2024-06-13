<?php
include('../preload.php');

$sqlTable = new SQLTable();

/*
 *  https://kdga.org/tristate/handicap/get_data.php?p1=1
 */

$key_value = $_GET['p1'];

$rows = $sqlTable->load('loadContactsByOrg', array($key_value));

$options = '';

foreach ($rows as $row) {
  $options .= '<option value="' . $row['PlayerID'] . '">' . $row['FullName'] . '</option>';
}

$sqlTable = null;

echo $options;
?>
