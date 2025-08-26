<?php
include('../preload.php');
include(INCLUDES . 'initialize_golf.php');
include(INCLUDES . 'course_init.php');
$division = $_GET['division'] == '4' ? '1,2,3' : $_GET['division'];
$skins = $golf->checkSkins($roundPlayed, $division);

include(HTML . 'beginHTML.php');
include(MENUS . 'navbar.php');
?>

<div class="container">
  <?php
  include('skins_title.php');
  include('skins_body.php');
  ?>
</div>

<?php include(HTML . 'endHTML.php'); ?>
