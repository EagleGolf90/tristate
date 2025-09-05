<?php
class Participants {
    private $participantService;

    public function __construct(IParticipantService $participantService)
    {
        $this->participantService = $participantService;
    }

    public function getParticipantsByRound($roundPlayed) {
        return $this->participantService->getParticipantsByRound($roundPlayed);
    }

    public function getSkinsParticipantsByRound($roundPlayed) {
        return $this->participantService->getSkinsParticipantsByRound($roundPlayed);
    }

    public function displayParticipants($roundPlayed) {
        return $this->participantService->displayParticipants($roundPlayed);
    }

    public function getRoundPlayed() {
        return $this->participantService->getRoundPlayed();
    }

}
?>
