<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
  <?php
  include('head_meta.php');
  include('head_titles.php');
  include('css_finder.php');
  include('js_load.php');
  ?>
</head>

<?php
switch ($file_name) {
  case 'scores/index.php':
  case 'scores/enterScores_orig.php':
?>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<?php
    break;
  case 'admin/index.php':
?>
<body class="text-center">
<?php
    break;
  case 'scores/test1.php':
?>
<body class="bg-body-tertiary">
<?php
    break;
}
?>
