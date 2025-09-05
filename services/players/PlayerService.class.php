<?php
interface IPlayerService {
    public function getPlayers($roundPlayed);
    public function getPlayersById($roundPlayed, $playerID);
    public function getLeaderboard();
    public function addContact($contactData);
}

class PlayerService implements IPlayerService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getPlayers($roundPlayed) {
        return $this->sqlTable->load('loadListOfPlayers', array($roundPlayed));
    }

    public function getPlayersById($roundPlayed, $playerID) {
        return $this->sqlTable->load('loadListOfPlayersById', array($roundPlayed, $playerID));
    }

    public function getLeaderboard() {
        return $this->sqlTable->load('loadLeaderboard', array());
    }

    public function addContact($contactData) {
        return $this->sqlTable->execute('addNames', array($contactData));
    }

}
?>
