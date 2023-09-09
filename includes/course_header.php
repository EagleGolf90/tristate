<?php
if (PAGE_NAME == 'leaderboard.php') {
  $display_message = '<h1>' . $courseInfo[0][1] . '</h1>';
  include(INCLUDES . 'display_message.php');

  $display_message = '<h2>' . $date_played . '</h2>';
  include(INCLUDES . 'display_message.php');

  $display_message = '<h3>' . $courseInfo[0][3] . ', ' . $courseInfo[0][4] . '</h3>';
  include(INCLUDES . 'display_message.php');
}
?>
