<?php
interface IParticipantService {
    public function getParticipantsByRound($roundPlayed);
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

}
?>
