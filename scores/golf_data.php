<?php
// include('initialize_golf.php');

// if (PAGE_NAME != 'which_page.php') {
//   if (PAGE_NAME != 'two_day.php' && PAGE_NAME == 'skins.php') {
//     $roundPlayed = $_GET['roundPlayed'];
//   } else {
//     $roundPlayed = '(SELECT MIN(RoundPlayed) FROM rounds WHERE DatePlayed >= CURRENT_DATE())';
//   }
//   $golf->setRoundPlayed($roundPlayed);
//   $roundID = $golf->getRoundID();

//   if (PAGE_NAME == 'skins.php') {
//     $skins = $golf->checkSkins($roundPlayed);
//   }

//   if (PAGE_NAME != 'two_day.php') {
//     $courseInfo = $golf->getCourseInfo();
//     $holes = $golf->getCourseDetails();

//     $allpars = '';
//     for ($idx = 0; $idx < sizeof($holes); $idx++) {
//       if ($allpars != '') $allpars .= ',';
//       $allpars .= $holes[$idx][0];
//     }

//     $course_name = $courseInfo[0][1];
//     $temp_date_played = date_create($courseInfo[0][2]);
//     $date_played = date_format($temp_date_played, "l, F d, Y");
//     $location = $courseInfo[0][3] . ', ' . $courseInfo[0][4]; 
//   }

//   switch (PAGE_NAME) {
//     case 'leaderboard.php':
//     case 'index.php':
//       $players = $golf->getPlayers($roundPlayed);
//       break;
//     case 'enterScores.php':
//       $players = $golf->getGroups($_GET['round'], $_GET['group']);
//       break;
//   }
// }
?>
