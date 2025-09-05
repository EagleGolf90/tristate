<?php
interface IPairingService {
    public function getPairings($roundPlayed);
    public function displayPairings($roundPlayed);
    public function calculateGroupSize();
}

class PairingService implements IPairingService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    public function getPairings($roundPlayed) {
        return $this->sqlTable->load('loadPairings', array($roundPlayed));
    }

    public function displayPairings($roundPlayed) {
        return $this->sqlTable->load('displayPairings', array($roundPlayed));
    }

    private function countPlayers() {
        $rows = $this->sqlTable->load('countPlayers', array());
        foreach ($rows as $row) $numberOfRows = $row['Total'];
        return empty($numberOfRows) ? 0 : $numberOfRows;
    }

    public function calculateGroupSize() {
        $totalGolfers = $this->countPlayers();
        $golfersInGroup = 4;
        $groupSizeRemainder = fmod($totalGolfers, $golfersInGroup);
        $groupSize = intval($totalGolfers / $golfersInGroup);
        if ($groupSizeRemainder > 0) $groupSize += 1;
        return $groupSize;
    }

}
?>
