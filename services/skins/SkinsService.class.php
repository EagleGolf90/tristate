<?php
interface ISkinsService {
    public function getSkinsParticipants();
    public function displaySkinsParticipants();
    public function checkSkins($skinsRecord);
    public function addSkins($skinsRecord);
    public function deleteSkins($roundPlayed, $playerID);
}

class SkinsService implements ISkinsService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getSkinsParticipants() {
        return $this->sqlTable->load('loadSkinsParticipants', array());
    }

    public function displaySkinsParticipants() {
        return $this->sqlTable->load('displaySkinsParticipants', array());
    }

    public function checkSkins($skinsRecord) {
        return $this->sqlTable->load('checkSkins', array($skinsRecord->RoundPlayed, $skinsRecord->PlayerID));
    }

    public function addSkins($skinsRecord) {
        return $this->sqlTable->execute('addSkins', array($skinsRecord->RoundPlayed, $skinsRecord->PlayerID, $skinsRecord->Paid, $skinsRecord->Cost));
    }

    public function deleteSkins($roundPlayed, $playerID) {
        $this->sqlTable->execute('deleteSkinsParticipants', array($roundPlayed, $playerID));
    }

}
?>
