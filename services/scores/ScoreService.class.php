<?php
interface IScoreService {
    public function addScores($scoreData);
    public function getTeamScores($org_id);
    public function getAllScores();
    public function getScoresByRound($roundPlayed);
    public function getRounds();
    public function getCurrentRound();
}

class ScoreService implements IScoreService {
    private $sqlTable;

    public function __construct(SQLTable $sqlTable) {
        $this->sqlTable = $sqlTable;
    }

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

    public function getAllScores() {
        return $this->sqlTable->load('loadAllScores', array());
    }

    public function getScoresByRound($roundPlayed) {
        return $this->sqlTable->load('loadAllScores', array($roundPlayed));
    }

    public function getRounds() {
        return $this->sqlTable->load('loadRounds', array());
    }

    public function getCurrentRound() {
        $rows = $this->sqlTable->load('loadCurrentRound', array());
        $roundPlayed = 0;
        foreach ($rows as $row) {
            $roundPlayed = $row['RoundPlayed'];
        }
        return $roundPlayed;
    }

}
?>
