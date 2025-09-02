<?php
interface IScoreService {
    public function addScores($scoreData);
    public function getTeamScores($org_id);
}

class ScoreService implements IScoreService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

    /**
     * Returns true if scores were added successfully.
     *
     * @param array $scoreData Associative array with keys 'players', and 'scores'.
     * @return boolean true on success, false on failure.
     */
    public function addScores($scoreData) {
        // $scoreData should be a structured array, not $_POST
        foreach ($scoreData['players'] as $player) {
            $totalScore = array_sum($player['scores']);
            foreach ($player['scores'] as $hole => $score) {
                $this->sqlTable->execute('addScores', [
                    $player['id'], $scoreData['roundPlayed'], $scoreData['roundID'], $hole + 1, $score
                ]);
            }
        }
        return true;
    }

    public function getTeamScores($org_id) {
        return $this->sqlTable->load('loadTeamsScores', array($org_id));
    }

}
?>
