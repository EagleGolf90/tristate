<?php
interface IPlayerService {
    public function getPlayers($roundPlayed);
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

    public function addContact($contactData) {
        return $this->sqlTable->execute('addNames', $contactData);
    }

}
?>
