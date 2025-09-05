<?php
include(PARTICIPANTS_PATH . 'Participants.class.php');
include(PARTICIPANTS_PATH . 'ParticipantService.class.php');

$sqlTable = new SQLTable();
$participantService = new ParticipantService($sqlTable);

$participants = new Participants($participantService);
?>
