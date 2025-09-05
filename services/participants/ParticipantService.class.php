<?php
interface IParticipantService {
    public function getParticipantsByRound($roundPlayed);
    public function getSkinsParticipantsByRound($roundPlayed);
    public function getParticipants();
    public function displayParticipants();
    public function getRoundPlayed();
}

class ParticipantService implements IParticipantService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getParticipantsByRound($roundPlayed) {
        return $this->sqlTable->load('loadParticipants', array($roundPlayed));
    }

    public function getSkinsParticipantsByRound($roundPlayed) {
        return $this->sqlTable->load('loadSkinsParticipants', array($roundPlayed));
    }

    public function getParticipants() {
        return $this->sqlTable->load('loadParticipants', array());
    }

    public function displayParticipants() {
        return $this->sqlTable->load('displayParticipants', array());
    }

    public function getRoundPlayed() {
        return $this->sqlTable->load('loadSetup', array());
    }

}
?>
