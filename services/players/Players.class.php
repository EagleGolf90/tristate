<?php
class Players {
    private $playerService;

    public function __construct(IPlayerService $playerService)
    {
        $this->playerService = $playerService;
    }

    public function getPlayers($roundPlayed) {
        return $this->playerService->getPlayers($roundPlayed);
    }

    public function getPlayersById($roundPlayed, $playerID) {
        return $this->playerService->getPlayersById($roundPlayed, $playerID);
    }

    public function getLeaderboard() {
        return $this->playerService->getLeaderboard();
    }

    public function addContact($contactData) {
        return $this->playerService->addContact($contactData);
    }

}
?>
